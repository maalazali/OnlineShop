<?php
//include DatabaseHelper.php file
require_once('DatabaseHelpKunde.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$email = '';
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

$username = '';
if(isset($_POST['username'])){
    $username = $_POST['username'];
}

$passwort = '';
if(isset($_POST['passwort'])){
    $passwort = $_POST['passwort'];
}

// Insert method
$success = $database-> insertIntoKundeX($email, $username, $passwort);

// Check result
if ($success){
    echo "Kunde '{$username}' successfully added!'";
}
if(!$success){
    $error = oci_error();
    if($error['code'] = -20001){
        echo "@ Zeichen fehlt";
    }
}
else{
    echo "Error can't insert Kunde '{$username}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="benutzer.php">
    go back
</a>