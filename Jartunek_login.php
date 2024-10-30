<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/Jartunek_login_css.css"> 
</head>
<body>
    <div class="outer-container">
        <?php
        session_start();
        if (isset($_SESSION['error'])) {
            echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        ?>

        <div class="login-container">
            <h2>Přihlášení</h2>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="Uživatelské jméno" required>
                <input type="password" name="password" placeholder="Heslo" required>
                <input type="submit" value="Přihlásit se">
                <button type="button" onclick="window.location.href='Jartunek_register.php'">Registrovat</button>
            </form>
        </div>
    </div>
</body>
</html>
