<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adres-toevoegen</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        function validateForm() {
            var inputs = document.getElementById("nieuw-adres").getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value === "") {
                    alert("Please fill in all fields.");
                    return false;
                }
            }
            return true;
        }
    </script>
</head>

<body>
    <main>
        <div class="container">
            <div>
                <h1>adres toevoegen</h1>
            </div>
            <form id="nieuw-adres" class="form" action="verwerk-adres.php" method="post" onsubmit="return validateForm();">
                <label for="postcodea">Postcode</label>
                <input type="text" name="postcodea" id="postcodea" required>

                <label for="straata">Straat</label>
                <input type="text" name="straata" id="straata" required>

                <label for="huisnummera">Huisnummer</label>
                <input type="text" name="huisnummera" id="huisnummera" required>

                <label for="plaatsa">Plaats</label>
                <input type="text" name="plaatsa" id="plaatsa" required>

                <label for="landa">Land</label>
                <input type="text" name="landa" id="landa" required>

                <label for="omschrijvinga">Omschrijving</label>
                <input type="text" name="omschrijvinga" id="omschrijvinga" required>

                <label for="telefoonNa">Telefoonnummer</label>
                <input type="text" name="telefoonNa" id="telefoonNa" required>

                <label for="notitiea">Notitie</label>
                <input type="text" name="notitiea" id="notitiea" required>

                <button class="formbutton" type="submit">Toevoegen</button>
            </form>
        </div>
    </main>
</body>

</html>