<?php
require 'database.php';
//session_start();
//
//if (!isset($_SESSION['SignedIn'])) {
//    header("location: Sign-in.php");
//}
//if (!isset($_SESSION['admin'])) {
//    header("location: Sign-in.php");
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gebruiker-toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div>
            <div>
                <h1>Nieuwe gebruiker maken</h1>
            </div>
            <form id="nieuwe-gebruiker" class="form" action="verwerk-nieuwe-gebruiker.php" method="post">

                <label for="vnaamg">Voornaam</label>
                <input type="text" name="vnaamg" id="vnaamg">

                <label for="tusseng">Tussenvoegsel</label>
                <input type="text" name="tusseng" id="tusseng">

                <label for="anaamg">Achternaam</label>
                <input type="text" name="anaamg" id="anaamg">

                <label for="geslachtg">Geslacht</label>
                <input type="text" name="geslachtg" id="geslachtg">

                <label for="mobielg">Mobielnummer</label>
                <input type="text" name="mobielg" id="mobielg">

                <label for="emailg">Email</label>
                <input type="text" name="emailg" id="emailg">

                <label for="gbnaamg">Gebruikersnaam</label>
                <input type="text" name="gbnaamg" id="gbnaamg">

                <label for="paswoordg">Paswoord</label>
                <input type="text" name="paswoordg" id="paswoordg">

                <button class="formbutton" type="submit">Nieuwe gebruiker maken!</button>
            </form>
        </div>
    </main>

</body>

</html>