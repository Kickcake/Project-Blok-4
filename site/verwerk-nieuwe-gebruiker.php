<?php
require 'database.php';

if (!empty($_POST['vnaamg'])) {
    $Vnaam = $_POST['vnaamg'];
    $tussen = $_POST['tusseng'];
    $Anaam = $_POST['anaamg'];
    $geslacht = $_POST['geslachtg'];
    $mobiel = $_POST['mobielg'];
    $email = $_POST['emailg'];
    $GBnaam = $_POST['gbnaamg'];
    $paswoord = $_POST['paswoordg'];
    $rol = $_POST['rolg'];
    $hashed_pass = password_hash($paswoord, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Gebruiker (rol, voornaam, tussenvoegsel, achternaam, geslacht, mobielnummer, email, gebruikersnaam, paswoord) 
                            VALUES ('$rol', '$Vnaam', '$tussen', '$Anaam', '$geslacht', '$mobiel', '$email', '$GBnaam', '$hashed_pass')";
    mysqli_query($conn, $sql);

    $lastInsertId = mysqli_insert_id($conn);

    if ($rol == 'administrator') {
        $roleTable = 'administrator';
    } elseif ($rol == 'manager') {
        $roleTable = 'manager';
    } else {
        $roleTable = 'regular';
    }

    $roleSql = "INSERT INTO $roleTable (id) VALUES ('$lastInsertId')";
    mysqli_query($conn, $roleSql);

    session_start();
    $_SESSION['user_id'] = $lastInsertId;
    header("location: adres_toevoegen.php");
} else {
    header("location: nieuwe-gebruiker.php");
}
