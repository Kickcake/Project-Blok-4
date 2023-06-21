<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
    include '405.php';
    exit;
}

if (!isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['password']) || empty($_POST['password'])) {
    header("location: inloggen.php");
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];
require 'database.php';

$sql = "SELECT * FROM Gebruiker WHERE email = '$email' ";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (!is_array($user) || is_bool($user) || !password_verify($password, $user['paswoord'])) {
    header("location: inloggen.php");
    exit;
}

session_start();
$_SESSION['SignedIn'] = true;
$_SESSION['sname'] = $user['voornaam'];

$isrol = $user['rol'];

if ($isrol === 'administrator') {
    $_SESSION['manager'] = false;
    $_SESSION['admin'] = true;
    header("location: dashadmin.php");
    exit;
} elseif ($isrol === 'manager') {
    $_SESSION['admin'] = false;
    $_SESSION['manager'] = true;
    header("location: dashmanager.php");
    exit;
} else {
    $_SESSION['admin'] = false;
    $_SESSION['manager'] = false;
    header("location: dash.php");
}


exit;
