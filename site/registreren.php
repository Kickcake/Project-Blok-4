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
    <main>
        <div class="container">
            <div>
                <h1>registreren</h1>
            </div>
            <form id="nieuwe-gebruiker" class="form" action="verwerk-registreren.php" method="post" onsubmit="return validateForm();">

                <?php if (isset($error_message)) : ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

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

                <button class="formbutton" type="submit">registreren</button>
            </form>
            <div class="login-button">
                <h3>Al een account?</h3>
                <a href="inloggen.php"><button class="login-button">Inloggen</button></a>
            </div>
        </div>
    </main>
</body>

</html>