<?php
require 'database.php';
session_start();

if (!isset($_SESSION['SignedIn'])) {
    header("location: sign-in.php");
}
if (!isset($_SESSION['admin'])) {
    header("location: dash.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dash</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>yo cool je ben ingelogt maar adminfg denk ik</h1>
    <p>je naam is <?php echo $_SESSION['sname'] ?></p>
    <div>
        <a href="logout.php"> log out</a>
    </div>
</body>

</html>