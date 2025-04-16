<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('DatabaseHelper.php');
$database = new DatabaseHelper();


$Seriennummer = '';
if(isset($_POST['Seriennummer'])){
    $Seriennummer = $_POST['Seriennummer'];
    $remove_success = $database->removeProduct($Seriennummer);

    if ($remove_success) {
        echo "Produkt erfolgreich gelöscht!";
    } else {
        echo "Fehler: Produkt konnte nicht gelöscht werden!";
    }
}

/*if ($error_code == 1){
    header("Location: warenkorb.php?status=success");
    exit();
}
else{
    header("Location: warenkorb.php?status=error&errorcode={$error_code}");
    exit();
}*/




/*
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Seriennummer'])) {
    $Seriennummer = $_POST['Seriennummer'];

    $Seriennummer = '';
    if(isset($_POST['Seriennummer'])){
        $Seriennummer = $_POST['Seriennummer'];
    }
    
    $Produkt_name = '';
    if(isset($_POST['Produkt_name'])){
        $Produkt_name = $_POST['Produkt_name'];
    }
    
    $Preis_Produkt = '';
    if(isset($_POST['Preis_Produkt'])){
        $Preis_Produkt = $_POST['Preis_Produkt'];
    }
        
    $error_code = $database->removeProduct($Seriennummer);

    if ($error_code == 1) {
        // Umleitung zurück zum Warenkorb mit einer Erfolgsmeldung
        header("Location: warenkorb.php?status=success");
        exit();
    } else {
        // Umleitung zurück zum Warenkorb mit einer Fehlermeldung
        header("Location: warenkorb.php?status=error&code={$error_code}");
        exit();
    }
}*/


?>

<a href="warenkorb.php">
    Zurück
</a>