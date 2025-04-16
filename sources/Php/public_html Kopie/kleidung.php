<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('DatabaseHelper.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//this object is used to interact with the database
$database = new DatabaseHelper();

$produkt_array = $database->selectAllProdukte();

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
<h1>
    <a href="index.php">ZOLA</a>
</h1>
    <a href="search.php">Search</a>
    <a name="add" href="warenkorb.php">Warenkorb</a>
    <h2>Kleidung
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produktname</th>
                <th>Seriennummer</th>
                <th>Preis</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($produkt_array as $produktx) : ?>
        <tr>
            <td><?php echo htmlspecialchars($produktx['PRODUKT_NAME']); ?></td> 
            <td>
                <a href="produkte.php?Seriennummer=<?php echo htmlspecialchars($produktx['SERIENNUMMER']); ?>">
                <?php echo $produktx['SERIENNUMMER']; ?>
                </a>
            </td>
            <td><?php echo htmlspecialchars($produktx['PREIS_PRODUKT']); ?> €</td>
            <td>      
            <form method="post" action="warenkorb.php">  
            <input type="hidden" name="Seriennummer" value="<?php echo htmlspecialchars($produktx['SERIENNUMMER']); ?>">
            <input type="hidden" name="Produkt_name" value="<?php echo htmlspecialchars($produktx['PRODUKT_NAME']); ?>">
            <input type="hidden" name="Produkt_preis" value="<?php echo htmlspecialchars($produktx['PREIS_PRODUKT']); ?>">
            <input name="add" type="submit" value="In den Warenkorb legen">
            </form>
            </td>
            
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>