<?php
require_once 'database.php';
session_start();

if (!isset($_SESSION['SignedIn'])) {
    header("location: dash.php");
}
if ($_SESSION['admin'] == false) {
    header("location: dash.php");
}

// Count the total number of users
$sqlq = "SELECT COUNT(*) AS row_count FROM Gebruiker";
$result = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($result);
$rowCount = $row['row_count'];

// Count the number of users per role
$sqlAdminCount = "SELECT COUNT(*) AS admin_count FROM Gebruiker WHERE rol = 'administrator'";
$resultAdmin = mysqli_query($conn, $sqlAdminCount);
$rowAdmin = mysqli_fetch_assoc($resultAdmin);
$adminCount = $rowAdmin['admin_count'];

$sqlManagerCount = "SELECT COUNT(*) AS manager_count FROM Gebruiker WHERE rol = 'manager'";
$resultManager = mysqli_query($conn, $sqlManagerCount);
$rowManager = mysqli_fetch_assoc($resultManager);
$managerCount = $rowManager['manager_count'];

$sqlUserCount = "SELECT COUNT(*) AS user_count FROM Gebruiker WHERE rol = 'regular'";
$resultUser = mysqli_query($conn, $sqlUserCount);
$rowUser = mysqli_fetch_assoc($resultUser);
$userCount = $rowUser['user_count'];

$sqlUsers = "SELECT * FROM Gebruiker";
$gebruikers = mysqli_query($conn, $sqlUsers);
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
        <h1>Gebruiker</h1>
        <div class="search-container">
            <input type="text" id="searchInput" class="search-input" placeholder="zoeken...">
            <button id="searchButton" class="search_button">zoek</button>
        </div>
        <div>
            <?php echo "Aantal gebruikers: " . $rowCount; ?><br>
            <?php echo "Aantal admins: " . $adminCount; ?><br>
            <?php echo "Aantal managers: " . $managerCount; ?><br>
            <?php echo "Aantal regulars: " . $userCount; ?>
        </div>
        <table id="gebruikerTable" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>adres_id</th>
                    <th>rol</th>
                    <th>voornaam</th>
                    <th>tussenvoegsel</th>
                    <th>achternaam</th>
                    <th>geslacht</th>
                    <th>mobielnummer</th>
                    <th>email</th>
                    <th>gebruikersnaam</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($gebruikers as $gebruiker) {
                    echo "<tr>";
                    echo "<td>" . $gebruiker["id"] . "</td>";
                    echo "<td>" . $gebruiker["adres_id"] . "</td>";
                    echo "<td>" . $gebruiker["rol"] . "</td>";
                    echo "<td>" . $gebruiker["voornaam"] . "</td>";
                    echo "<td>" . $gebruiker["tussenvoegsel"] . "</td>";
                    echo "<td>" . $gebruiker["achternaam"] . "</td>";
                    echo "<td>" . $gebruiker["geslacht"] . "</td>";
                    echo "<td>" . $gebruiker["mobielnummer"] . "</td>";
                    echo "<td>" . $gebruiker["email"] . "</td>";
                    echo "<td>" . $gebruiker["gebruikersnaam"] . "</td>";
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