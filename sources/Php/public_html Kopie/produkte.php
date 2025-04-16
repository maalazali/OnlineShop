<?php
    require_once('DatabaseHelperEmpfehlung.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $Seriennummer = '';
    if(isset($_GET['Seriennummer'])){
        $Seriennummer = $_GET['Seriennummer'];
    }
    $database = new DatabaseHelperEmpfehlung();
    $empfhelung_array = $database->selectEmpfehlung($Seriennummer);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Produkte</title>
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
    <h2>Produkte</h2>
    <table class="table">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Empfohlen</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($empfhelung_array as $empfehlung) : ?>
            <tr>
            <td><?php echo htmlspecialchars($empfehlung['EMPFOHLENEPRODUKT']); ?></td>
            <td><?php echo htmlspecialchars($empfehlung['EMPFEHLERPRODUKT']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>