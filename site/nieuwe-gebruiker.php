<?php
require 'database.php';
session_start();

if (!isset($_SESSION['SignedIn'])) {
    header("location: inloggen.php");
}
if ($_SESSION['admin'] == false) {
    header("location: dash.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gebruiker-toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function validateForm() {
            var inputs = document.getElementById("nieuwe-gebruiker").getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    alert("Please fill in all fields.");
                    return false;
                }
            }
            return confirm("Are you sure you want to submit this form?");
        }
    </script>
</head>

<body>
    <?php if ($_SESSION['admin'] == true) {
        include 'compents/headeradmin.php';
    } elseif ($_SESSION['manager'] == true) {
        include 'compents/headermanager.php';
    } else {
        include 'compents/header.php';
    } ?>

    <main>
        <div class="container">
            <div>
                <h1>Nieuwe gebruiker maken</h1>
            </div>
            <?php if (isset($error_message)) : ?>
                <div class="error"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form id="nieuwe-gebruiker" class="form" action="verwerk-nieuwe-gebruiker.php" method="post" onsubmit="return validateForm();">

                <label for="vnaamg">Voornaam</label>
                <input type="text" name="vnaamg" id="vnaamg">

                <label for="tusseng">Tussenvoegsel</label>
                <input type="text" name="tusseng" id="tusseng">

                <label for="anaamg">Achternaam</label>
                <input type="text" name="anaamg" id="anaamg">

                <label for="geslachtg">Geslacht</label>
                <select class="Iselect" name="geslachtg" id="geslachtg">
                    <option value="man">Man</option>
                    <option value="vrouw">Vrouw</option>
                    <option value="anders">Anders</option>
                </select>

                <label for="mobielg">Mobielnummer</label>
                <input type="text" name="mobielg" id="mobielg">

                <label for="emailg">Email</label>
                <input type="text" name="emailg" id="emailg">

                <label for="gbnaamg">Gebruikersnaam</label>
                <input type="text" name="gbnaamg" id="gbnaamg">

                <label for="paswoordg">Paswoord</label>
                <input type="text" name="paswoordg" id="paswoordg">

                <label for="rolg">Rol</label>
                <select class="Iselect" name="rolg" id="rolg" onchange="toggleAfdelingAndInDienst()">
                    <option value="regular">regular</option>
                    <option value="manager">manager</option>
                    <option value="administrator">administrator</option>
                </select>

                <label for="afdeling" class="afdelingElement" style="display: none;">Afdeling</label>
                <select class="Iselect afdelingElement" name="afdeling" id="afdeling" style="display: none;">
                    <option value="boekhouding">boekhouding</option>
                    <option value="database">database</option>
                    <option value="front-end">front-end</option>
                </select>

                <label for="inDienst" class="inDienstElement" style="display: none;">In Dienst</label>
                <select class="Iselect inDienstElement" name="inDienst" id="inDienst" style="display: none;">
                    <option value="1">True</option>
                    <option value="0">False</option>
                </select>

                <button class="formbutton" type="submit">Aanmaken</button>
            </form>
        </div>
    </main>
    <script src="rolscript.js"></script>
</body>

</html>