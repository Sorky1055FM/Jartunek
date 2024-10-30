<?php
session_start();
session_unset();
session_destroy();
header("Location: Jartunek_login.php");
exit();
