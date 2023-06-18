<?php
require 'database.php';
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

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
            //doesn't work totally nothing gets added to the manager table
            $afdeling = $_POST['afdeling'];

            $managerSql = "INSERT INTO manager (id, afdeling) VALUES ('$lastInsertId', '$afdeling')";
            mysqli_query($conn, $managerSql);

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

        session_start();
        $_SESSION['user_id'] = $lastInsertId;
        header("location: adres_toevoegen.php");
        exit;
    } else {
        $error = mysqli_error($conn);
        echo "Error: " . $error;
    }
} else {
    header("location: nieuwe-gebruiker.php");
    exit;
}
