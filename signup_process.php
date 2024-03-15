<?php
// Include the database connection file
include 'includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $identification_number = $_POST['identification_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        die("Error: Passwords do not match");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (name, phone_number, identification_number, password) VALUES ('$name', '$phone_number', '$identification_number', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        // Redirect the user to index.php
        header("Location: index.php");
        exit; // Make sure to exit after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
