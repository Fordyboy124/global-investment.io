# Assuming you're using Python and Flask for the web framework, and SQLite for the database

from flask import Flask, render_template, request, redirect, url_for
import sqlite3
import datetime

app = Flask(__name__)

# Connect to the SQLite database
conn = sqlite3.connect('investment.db')
cursor = conn.cursor()

# Define routes

@app.route('/balance')
def balance():
    # Retrieve user's balance from the database
    user_id = request.args.get('user_id')  # Assuming you have user authentication
    cursor.execute("SELECT balance FROM users WHERE id = ?", (user_id,))
    balance = cursor.fetchone()[0]
    return render_template('balance.html', balance=balance)

@app.route('/withdraw', methods=['GET', 'POST'])
def withdraw():
    if request.method == 'POST':
        user_id = request.form['user_id']
        withdrawal_amount = float(request.form['withdrawal_amount'])

        # Check withdrawal frequency
        cursor.execute("SELECT last_withdrawal_date FROM users WHERE id = ?", (user_id,))
        last_withdrawal_date = cursor.fetchone()[0]

        if last_withdrawal_date and (datetime.datetime.now() - datetime.datetime.strptime(last_withdrawal_date, '%Y-%m-%d')).days < 7:
            return "You can only withdraw once every 7 days."

        # Check if withdrawal amount is within balance
        cursor.execute("SELECT balance FROM users WHERE id = ?", (user_id,))
        balance = cursor.fetchone()[0]

        if withdrawal_amount > balance:
            return "Insufficient balance for withdrawal."

        # Update withdrawal status to 'processing'
        cursor.execute("INSERT INTO withdrawals (user_id, withdrawal_amount, status) VALUES (?, ?, 'processing')", (user_id, withdrawal_amount))
        conn.commit()

        # Update last withdrawal date
        cursor.execute("UPDATE users SET last_withdrawal_date = ? WHERE id = ?", (datetime.datetime.now().strftime('%Y-%m-%d'), user_id))
        conn.commit()

        return "Withdrawal request submitted. It will be processed shortly."
    else:
        return render_template('withdraw.html')

# Admin routes

@app.route('/admin/withdrawals')
def admin_withdrawals():
    # Retrieve pending withdrawal requests
    cursor.execute("SELECT * FROM withdrawals WHERE status = 'processing'")
    withdrawals = cursor.fetchall()
    return render_template('admin_withdrawals.html', withdrawals=withdrawals)

@app.route('/admin/process_withdrawal/<int:withdrawal_id>')
def process_withdrawal(withdrawal_id):
    # Update withdrawal status to 'paid'
    cursor.execute("UPDATE withdrawals SET status = 'paid' WHERE id = ?", (withdrawal_id,))
    conn.commit()
    return redirect(url_for('admin_withdrawals'))

if __name__ == '__main__':
    app.run(debug=True)
