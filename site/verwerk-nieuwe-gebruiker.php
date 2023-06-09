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

    $sql = "INSERT INTO Gebruiker (voornaam, tussenvoegsel, achternaam, geslacht, mobielnummer, email, gebruikersnaam, paswoord) 
                            VALUES ('$Vnaam', '$tussen', '$Anaam', '$geslacht', '$mobiel', '$email', '$GBnaam', '$paswoord')";
    mysqli_query($conn, $sql);
    header("location: adres_toevoegen.php");
}
