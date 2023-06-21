<?php
require 'database.php';
session_start();

if (!isset($_SESSION['SignedIn'])) {
    header("location: inloggen.php");
}
if ($_SESSION['admin'] == true) {
    header("location: dashadmin.php");
}
if ($_SESSION['manager'] == false) {
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
    <?php if ($_SESSION['admin'] == true) {
        include 'compents/dash/headeradmin.php';
    } elseif ($_SESSION['manager'] == true) {
        include 'compents/dash/headermanager.php';
    } else {
        include 'compents/dash/header.php';
    } ?>

    <div class="content">
        <h1>Je bent ingelogd op een Manager account</h1>
        <p>je naam is <?php echo $_SESSION['sname'] ?></p>
        <div>
            <a href="logout.php">log out</a>
        </div>
    </div>

</body>

</html>