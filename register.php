<?php
session_start();  
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check = $conn->query("SELECT id FROM users WHERE username='$username'");
    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Username already exists. Please choose another.";
        header("Location: Jartunek_register.php");
        exit();  
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("Location: Jartunek_login.php");
            exit();
        } else {
            $_SESSION['error'] = "An error occurred. Please try again.";
            header("Location: Jartunek_register.php");
            exit();
        }
    }
}

$conn->close();
?>
