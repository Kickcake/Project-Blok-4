<?php
require_once 'database.php';
session_start();

$sql = "SELECT * FROM adressen";
$adressen = mysqli_query($conn, $sql);

$sqlq = "SELECT COUNT(*) AS row_count FROM adressen";
$result = mysqli_query($conn, $sqlq);

$row = mysqli_fetch_assoc($result);
$rowCount = $row['row_count'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php if ($_SESSION['admin'] == true) {
        include 'compents/headeradmin.php';
    } elseif ($_SESSION['manager'] == true) {
        include 'compents/headermanager.php';
    } else {
        include 'compents/header.php';
    } ?>

    <div class="containerS">
        <h1>adressen</h1>
        <div class="search-container">
            <input type="text" id="searchInput" class="search-input" placeholder="zoeken...">
            <button id="searchButton" class="search_button">zoek</button>
        </div>
        <div>
            <?php if ($_SESSION['admin'] == true || $_SESSION['manager'] == true) {
                echo "Aantal adressen: " . $rowCount;
            } ?>
        </div>
        <table id="gebruikerTable" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>postcode</th>
                    <th>land</th>
                    <th>plaats</th>
                    <th>huisnummer</th>
                    <th>straat</th>
                    <th>telefoonnummer</th>
                    <th>omschrijving</th>
                    <th>notitie</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($adressen as $adres) {
                    echo "<tr>";
                    echo "<td>" . $adres["id"] . "</td>";
                    echo "<td>" . $adres["postcode"] . "</td>";
                    echo "<td>" . $adres["land"] . "</td>";
                    echo "<td>" . $adres["plaats"] . "</td>";
                    echo "<td>" . $adres["huisnummer"] . "</td>";
                    echo "<td>" . $adres["straat"] . "</td>";
                    echo "<td>" . $adres["telefoonnummer"] . "</td>";
                    echo "<td>" . $adres["omschrijving"] . "</td>";
                    echo "<td>" . $adres["notitie"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        let input = document.getElementById('searchInput');
        let button = document.getElementById('searchButton');
        let table = document.getElementById('gebruikerTable');

        button.addEventListener('click', function() {
            let term = input.value.toLowerCase();
            Array.from(table.getElementsByTagName('tr')).forEach(function(row) {
                if (row.getElementsByTagName('td').length > 0) {
                    let rowData = Array.from(row.getElementsByTagName('td')).map(function(cell) {
                        return cell.textContent.toLowerCase();
                    });

                    if (rowData.some(function(data) {
                            return data.includes(term);
                        })) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        });
    </script>

</body>

</html>