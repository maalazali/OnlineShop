<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once('DatabaseHelper.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//this object is used to interact with the database
$database = new DatabaseHelper();

$kunde_array = $database->selectAllKunde();

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
    <h2>Kunden
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($kunde_array as $kundex) : ?>
        <tr>
            <td><?php echo htmlspecialchars($kundex['EMAIL']); ?></td> 
            <td><?php echo htmlspecialchars($kundex['USERNAME']); ?> </td>
            <td>      
            <form method="post" action="alterKunde.php">  
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($kundex['EMAIL']); ?>">
            <input type="hidden" name="username" value="<?php echo htmlspecialchars($kundex['USERNAME']); ?>">
            <input name="update" type="submit" value="Bearbeiten">
            </form>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
