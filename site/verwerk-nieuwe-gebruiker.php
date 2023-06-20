<?php
require 'database.php';

session_start();

if (!empty($_POST['vnaamg'])) {
    $Vnaam = $_POST['vnaamg'];
    $tussen = $_POST['tusseng'];
    $Anaam = $_POST['anaamg'];
    $geslacht = $_POST['geslachtg'];
    $mobiel = $_POST['mobielg'];
    $email = $_POST['emailg'];
    $GBnaam = $_POST['gbnaamg'];
    $paswoord = $_POST['paswoordg'];
    $rol = $_POST['rolg'];
    $hashed_pass = password_hash($paswoord, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Gebruiker (rol, voornaam, tussenvoegsel, achternaam, geslacht, mobielnummer, email, gebruikersnaam, paswoord) 
                            VALUES ('$rol', '$Vnaam', '$tussen', '$Anaam', '$geslacht', '$mobiel', '$email', '$GBnaam', '$hashed_pass')";
    if (mysqli_query($conn, $sql)) {
        $lastInsertId = mysqli_insert_id($conn);

        if ($rol === 'administrator') {
            $in_dienst = $_POST['inDienst'];
            $adminSql = "INSERT INTO administrator (id, in_dienst) VALUES ('$lastInsertId', '$in_dienst')";
            mysqli_query($conn, $adminSql);
        } elseif ($rol === 'manager') {
            $afdeling = $_POST['afdeling'];

            $existingManagerSql = "SELECT id FROM manager WHERE afdeling = '$afdeling'";
            $existingManagerResult = mysqli_query($conn, $existingManagerSql);

            if (mysqli_num_rows($existingManagerResult) > 0) {
                $existingManagerRow = mysqli_fetch_assoc($existingManagerResult);
                $existingManagerId = $existingManagerRow['id'];

                $managerSql = "UPDATE manager SET id = '$lastInsertId' WHERE id = '$existingManagerId'";
                mysqli_query($conn, $managerSql);
            } else {
                $managerSql = "INSERT INTO manager (id, afdeling) VALUES ('$lastInsertId', '$afdeling')";
                mysqli_query($conn, $managerSql);
            }

            $countQuery = "SELECT COUNT(*) AS total_managers FROM manager WHERE afdeling = '$afdeling'";
            $countResult = mysqli_query($conn, $countQuery);
            $countRow = mysqli_fetch_assoc($countResult);
            $totalManagers = $countRow['total_managers'];

            $updateQuery = "UPDATE afdeling SET aantal_mensen = '$totalManagers' WHERE afdeling = '$afdeling'";
            mysqli_query($conn, $updateQuery);
        } elseif ($rol === 'regular') {
            $regularSql = "INSERT INTO regular (id, per_wanneer) VALUES ('$lastInsertId', CURDATE())";
            mysqli_query($conn, $regularSql);
        }

        $_SESSION['user_id'] = $lastInsertId;
        header("location: adres_toevoegen.php");
        exit;
    } else {
        $error = mysqli_error($conn);
        echo "Error inserting into Gebruiker table: " . $error;
    }
} else {
    header("location: nieuwe-gebruiker.php");
    exit;
}
