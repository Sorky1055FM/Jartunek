<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: Jartunek_stranka.php");
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
            header("Location: Jartunek_login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "No user found with that username.";
        header("Location: Jartunek_login.php");
        exit();
    }
}

$conn->close();
?>
