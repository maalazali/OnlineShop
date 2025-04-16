<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
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

// Insert method
$success = $database-> getCartItems($Seriennummer, $Produkt_name, $Preis_Produkt);
// Check result
if ($success){
    echo "'{$Seriennummer}', '{$Produkt_name}', '{$Preis_Produkt}' successfully added!'";
}
else{
    echo "Error can't insert in cart'!";
}
?>

<!-- link back to kleidung page-->
<br>
<a href="kleidung.php">
    go back
</a>