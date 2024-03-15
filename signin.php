<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">3>
     <title>Sign In</title>
    <style>
        body {
            background-color: goldenrod;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: silver;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #000;
            margin: 2px;
        }

        form {
            margin-bottom: 20px;
        }

        form .form-group {
            margin-bottom: 10px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Global Alternative Investment</h2>
        <h2>Sign In</h2>
        <form action="signin_process.php" method="POST">
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Sign In</a></button>
        </form>
        <p>Don't have an account yet? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
