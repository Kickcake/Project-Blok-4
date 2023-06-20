<?php
require 'database.php';
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
        <div class="container">
            <div>
                <h1>adres toevoegen</h1>
            </div>
            <form id="nieuw-adres" class="form" action="verwerk-adres.php" method="post">

                <label for="postcodea">postcode</label>
                <input type="text" name="postcodea" id="postcodea">

                <label for="straata">straat</label>
                <input type="text" name="straata" id="straata">

                <label for="huisnummera">huisnummer</label>
                <input type="text" name="huisnummera" id="huisnummera">

                <label for="plaatsa">plaats</label>
                <input type="text" name="plaatsa" id="plaatsa">

                <label for="landa">land</label>
                <input type="text" name="landa" id="landa">

                <label for="omschrijvinga">omschrijving</label>
                <input type="text" name="omschrijvinga" id="omschrijvinga">

                <label for="telefoonNa">telefoonnummer</label>
                <input type="text" name="telefoonNa" id="telefoonNa">

                <label for="notitiea">notitie</label>
                <input type="text" name="notitiea" id="notitiea">

                <button class="formbutton" type="submit">Toevoegen</button>
            </form>
        </div>
    </main>

</body>

</html>