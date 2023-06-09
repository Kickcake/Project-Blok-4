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

if (!is_array($user) || is_bool($user) || !password_verify($password, $user['password'])) {
    header("location: inloggen.php");
    exit;
}

session_start();
$_SESSION['SignedIn'] = true;
$_SESSION['sname'] = $user['voornaam'];
$_SESSION['user_id'] = $user['id'];

if (in_array($user['id'], $administratorIds)) {
    $_SESSION['admin'] = true;
    header("location: dashadmin.php");
    exit;
}


header("location: dash.php");
exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Yo cool, you are logged in!</h1>
</body>

</html>