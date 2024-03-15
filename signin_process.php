<?php
// Include the database connection file
include 'includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];

    // Retrieve user data from the database based on phone number
    $sql = "SELECT * FROM users WHERE phone_number='$phone_number'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Redirect the user to index.php
            header("Location: index.php");
            exit; // Make sure to exit after redirection
        } else {
            // Invalid password, redirect back to signin.php with error message
            header("Location: signin.php?error=invalid_password");
            exit; // Make sure to exit after redirection
        }
    } else {
        // User not found, redirect back to signin.php with error message
        header("Location: signin.php?error=user_not_found");
        exit; // Make sure to exit after redirection
    }

    // Close the database connection
    $conn->close();
    
}

