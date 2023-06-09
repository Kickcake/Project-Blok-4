<?php
require 'database.php';
session_start();
session_unset();
session_destroy();
header("location: inloggen.php");
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
    <?php include 'compents/header.php' ?>
    <h1>Yo cool, je bent uitgelogd!</h1>
</body>

</html>