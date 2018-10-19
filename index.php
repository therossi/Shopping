<?php
require_once("products.php");
require_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">

    <title>Shopping</title>

</head>
<body>
<div class="wrapper">

<form class="form" action="checkout.php" method="post">

    <p>Name: </p><input class="input" type="text" name="name" required="true"/>

    <p>Address: </p><input class="input" type="text" name="address" required="true"/>

    <p>Email: </p><input class="input" type="email" name="email" required="true"/>

    <p>Phone number: </p><input class="input last-input" type="text" name="phone" required="true"/>

<?php


echo "<h2>Place your order here:</h2>";
  echo "<div class='grid'>";
    echo '<div class="row">';
        echo "<h2 class='headings'>Product</h2>";
        echo "<h2 class='headings'>Price</h2>";
        echo "<h2 class='headings'>Quantity</h2>";
    echo '</div>';
    foreach ( $products as $product ) {
  
    echo '<div class="row">';

  
    foreach ( $product as $key => $value ) {

        //loops through array and prints product name
        if ($key == "name") {
            echo "<span> $value</span>";
             
        } 
        //loops through array to find price, runs price through function, prints price
        else if ($key == "price") {
            echo "<span>" . check_prices($value, $today_is) . " SEK</span>";
            
        } 
        //last value in array - prints input for user to choose quantity
        else {
        echo  "<span><input class='input-number' type='number' min='0' placeholder='0' name='".$value."_counter'/></span>";
        }
    }
    
    echo '</div>';
  }
  echo '</div>';

?>

   <input class="submit-button" type="submit" name="submit" value="Place order" />


</form>
</div>

    
</body>
</html>