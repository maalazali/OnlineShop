<?php
require_once('DatabaseHelper.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//this object is used to interact with the database
$database = new DatabaseHelper();
$zahlungsmethoden = $database->getUniqueZahlungsmethoden();
$lieferadressen = $database->getUniqueLieferadressen();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Online Shop</title>
    <style>
            body{
                font-family: 'Futura', sans-serif;
    
            }
            </style>
</head>
<body>
    <h1>Bestellungen</h1>
    <h2>Zahlungsmehtode</h2>
    <select name="zahlungsmethode">
    <?php foreach ($zahlungsmethoden as $methode): ?>
        <option value="<?php echo htmlspecialchars($methode); ?>">
            <?php echo htmlspecialchars($methode); ?>
        </option>
        
    <?php endforeach; ?>
    </select>

    <h2>Lieferadresse</h2>
    <select name="lieferadresse">
    <?php foreach ($lieferadressen as $adresse): ?>
        <option value="<?php echo htmlspecialchars($adresse); ?>">
            <?php echo htmlspecialchars($adresse); ?>
        </option>
    <?php endforeach; ?>
    </select>
    <h7>
    <br>
    <br>
        <a href="warenkorb.php">Zurück zum Warenkorb</a>
    </h7> 
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>