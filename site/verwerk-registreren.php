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
    $hashed_pass = password_hash($paswoord, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Gebruiker (voornaam, tussenvoegsel, achternaam, geslacht, mobielnummer, email, gebruikersnaam, paswoord) 
                            VALUES ('$Vnaam', '$tussen', '$Anaam', '$geslacht', '$mobiel', '$email', '$GBnaam', '$hashed_pass')";
    if (mysqli_query($conn, $sql)) {
        $lastInsertId = mysqli_insert_id($conn);
        session_start();
        $_SESSION['user_id'] = $lastInsertId;
        header("location: inloggen.php  ");
        exit;
    }
}
