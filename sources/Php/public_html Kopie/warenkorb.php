<?php


require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

if(!isset($cartArray)){
    $cartArray = array();
}    
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


    $success = $database-> insertIntoCart($Seriennummer, $Produkt_name, $Preis_Produkt);
    
        $cartArray = $database->fetchCartItem();
    


/*

var_dump($_POST ['Seriennummer']);
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

var_dump($_POST ['yes']);
if(isset($_POST['yes'])){

if ($success){
    header("Location: warenkorb.php");
    exit;
}
else{
    echo "Error can't insert in cart!";
    }
}
*/

$totalAmount = $database->getTotalCartAmount();
if ($totalAmount !== null) {
    $formattedTotalAmount = number_format($totalAmount, 2, ',', '.');
} else {
    $formattedTotalAmount = "0,00";
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Warenkorb</title>
    <h2>
        <a href="bestellung.php">Bestellungen</a>
    </h2>
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
    <h1>Warenkorb</h1>
    <h4>Gesamtbetrag im Warenkorb: <?php echo number_format($totalAmount, 2, ',', '.'); ?> €</h4>
    <h5>
    <a href="kleidung.php">back</a>
    </h5> 
    <table class="table">
    <thead>
        <tr>
            <th>Produkt</th>
            <th>Preis</th>
            <th>Seriennummer</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    
    <?php foreach ($cartArray as $cartx) : ?>
        <tr>
       
        <td><?php echo $cartx['PRODUKT_NAME']; ?></td> 
        <td><?php echo $cartx['PREIS_PRODUKT']; ?> €</td>
        <td><?php echo $cartx['SERIENNUMMER']; ?> </td>
        <td>      
            <form method="post" action="removeFromCart.php">  
            <input type="hidden" name="Seriennummer" value="<?php echo htmlspecialchars($cartx['SERIENNUMMER']); ?>">
            <input type="submit" value="Entfernen">
            </form>
        </td>
    
    </tr>
    <?php endforeach; ?>


    </tbody>
    </table>
    
</body>
</html>