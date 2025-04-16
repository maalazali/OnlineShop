<?php
require_once('DatabaseHelperEmpfehlung.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//this object is used to interact with the database
$database = new DatabaseHelperEmpfehlung();
$empfehlung_array = $database->selectAllEmpfehlungen();

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
    <h1>ZOLA</h1>
    <h2>Produkt
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Empfohlene Produkte</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($empfehlung_array as $empfehlenX) : ?>
        <tr>
            <td><?php echo htmlspecialchars($empfehlenX['EMPFEHLERPRODUKT']); ?></td>
            <td><?php echo htmlspecialchars($empfehlenX['EMPFOHLENEPRODUKT']); ?></td>
        </tr>
        <?php endforeach; ?>
</tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>