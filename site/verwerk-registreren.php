<?php
require 'database.php';

session_start();

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

    $sql = "INSERT INTO Gebruiker (rol, voornaam, tussenvoegsel, achternaam, geslacht, mobielnummer, email, gebruikersnaam, paswoord) 
                            VALUES ('regular', '$Vnaam', '$tussen', '$Anaam', '$geslacht', '$mobiel', '$email', '$GBnaam', '$hashed_pass')";
    if (mysqli_query($conn, $sql)) {
        $lastInsertId = mysqli_insert_id($conn);

        $regularSql = "INSERT INTO regular (id, per_wanneer) VALUES ('$lastInsertId', CURDATE())";
        mysqli_query($conn, $regularSql);

        $_SESSION['user_id'] = $lastInsertId;
        header("location: dash.php");
        exit;
    } else {
        $error = mysqli_error($conn);
        echo "Error inserting into Gebruiker table: " . $error;
    }
} else {
    header("location: nieuwe-gebruiker.php");
}
