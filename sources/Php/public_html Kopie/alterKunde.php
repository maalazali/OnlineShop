<?php

ob_start();


require_once('DatabaseHelper.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$database = new DatabaseHelper();


//var_dump($_GET['email'], $_GET['username']);



$email = '';
if(isset($_GET['email'])){
    $email = $_GET['email'];
    //var_dump($_GET);
}

$username = '';
if(isset($_GET['username'])){
    $username = $_GET['username'];
    //var_dump($_GET);
}


$success = $database->updateKunde($username, $email);


/*

if(isset($_GET['update'])){
    $success = $database->updateKunde($username, $email);
    echo " Erfolgreich";
    var_dump($_POST);
    
    if ($success){
        header("Location:alleKunden.php");
        
        exit;
    }
    else{
        echo "Error can't insert in cart!";
        }
    }

    var_dump($_POST);ob_end_flush();
*/
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Kunde</title>
    <style>
        body{
            font-family: 'Futura', sans-serif;
        }
        </style>
</head>
<body>
<h1>
    <a href="index.php">ZOLA</a>
</h1>
    <h2>Bearbeitung
    </h2>
    <form method="get">
    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
    

    <label for="username">Neuer username:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">

    <input type="submit" value="Aktualisieren">
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>