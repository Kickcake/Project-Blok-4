<?php
require 'database.php';

if (!empty($_POST['postcodea'])) {
    $postcode = $_POST['postcodea'];
    $straat = $_POST['straata'];
    $huisnummer = $_POST['huisnummera'];
    $plaats = $_POST['plaatsa'];
    $land = $_POST['landa'];
    $omschrijving = $_POST['omschrijvinga'];
    $telefoonnummer = $_POST['telefoonNa'];
    $notitie = $_POST['notitiea'];

    $sql = "INSERT INTO adressen (omschrijving, straat, huisnummer, postcode, plaats, land, telefoonnummer, notitie, toevoegdatum)
                 VALUES ('$omschrijving', '$straat', '$huisnummer', '$postcode', '$plaats', '$land', '$telefoonnummer', '$notitie', CURDATE())";

    mysqli_query($conn, $sql);
}
