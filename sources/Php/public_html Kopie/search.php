<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$produkt_name = '';
if(isset($_GET['produkt_name'])){
    $produkt_name= $_GET['produkt_name'];
}
$produkt_name_array = $database->searchProductName($produkt_name);

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
    <h1>Search</h1>
    <form method="get">
    <div>
        <label for="produkt_name">Produktname:</label>
        <input id="produkt_name" name="produkt_name" type="text" value='<?php echo $produkt_name; ?>' min="1">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<h2>Product Search Result:</h2>
<table>
    <tr>
        <th>Produkt</th>
    </tr>
    <?php foreach ($produkt_name_array as $produktx) : ?>
        <tr>
            <td><?php echo $produktx['SERIENNUMMER']; ?></td>
            <td><?php echo $produktx['PRODUKT_NAME']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<h4>
    <a href="kleidung.php">back</a>
</h4>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>