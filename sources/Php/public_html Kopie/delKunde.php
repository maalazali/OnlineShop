<?php
//include DatabaseHelper.php file
require_once('DatabaseHelpKunde.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$email = '';
if(isset($_POST['email'])){
    $email = $_POST['email'];
}

// Delete method
$error_code = $database->deletePerson($email);

// Check result
if ($error_code == 1){
    echo "Kunde with email: '{$email}' successfully deleted!'";
}
else{
    echo "Error can't delete Kunde with email: '{$email}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="benutzer.php">
    go back
</a>