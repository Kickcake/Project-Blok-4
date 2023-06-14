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

                <label for="afdeling" id="afdelingLabel" style="display: none;">Afdeling</label>
                <select class="Iselect" name="afdeling" id="afdeling" style="display: none;">
                    <option value="option1">boekhouding</option>
                    <option value="option2">database</option>
                    <option value="option3">front-end</option>
                </select>

                <label for="inDienst" id="inDienstLabel" style="display: none;">In Dienst</label>
                <select class="Iselect" name="inDienst" id="inDienst" style="display: none;">
                    <option value="optionA">True</option>
                    <option value="optionB">False</option>
                </select>

                <button class="formbutton" type="submit">Aanmaken!</button>
            </form>
        </div>
    </main>

    <script>
        function toggleAfdelingAndInDienst() {
            var rolSelect = document.getElementById("rolg");
            var afdelingLabel = document.getElementById("afdelingLabel");
            var afdelingSelect = document.getElementById("afdeling");
            var inDienstLabel = document.getElementById("inDienstLabel");
            var inDienstSelect = document.getElementById("inDienst");

            if (rolSelect.value === "manager") {
                afdelingLabel.style.display = "block";
                afdelingSelect.style.display = "block";
            } else {
                afdelingLabel.style.display = "none";
                afdelingSelect.style.display = "none";
            }

            if (rolSelect.value === "administrator") {
                inDienstLabel.style.display = "block";
                inDienstSelect.style.display = "block";
            } else {
                inDienstLabel.style.display = "none";
                inDienstSelect.style.display = "none";
            }
        }
    </script>
</body>

</html>