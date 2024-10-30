<?php
    for ($b = 0; $b < 1000; $b++) {
        $a = rand(1,6);
        echo $a . " ";
        if ($a == 6) {
        break;
        }
    }

    $serverip = "localhost";
$login = "root";
$password = "dudys";
$db = "login_system";

// Create connection
$conn = mysqli_connect($serverip, $login, $password, $db);

$username = $_POST['login'];
$password = $_POST['pass'];

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

$sql = "SELECT id, jmeno, prijmeni FROM users WHERE login = '$username' AND heslo = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"] . "<br>";
    echo "Jméno: " . $row["jmeno"] . "<br>";
    echo "Příjmení: " . $row["prijmeni"] . "<br>";
} else {
    echo "Špatné údaje";
}

mysqli_close($conn);
?>