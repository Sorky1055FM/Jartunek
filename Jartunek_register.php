<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Jartunek_register.css">
    <title>Register</title>
</head>
<body>
<?php
    if (isset($_SESSION['error'])) {
        echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']); 
    }
    ?>

    <div class="register-container">
        <h2>Registrace</h2>
        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Uživatelské jméno" required>
            <input type="password" name="password" placeholder="Heslo" required>
            <input type="submit" value="Registrovat">
        </form>
    </div>
    <!-- <div class="loader"></div> -->
    
</body>
</html>