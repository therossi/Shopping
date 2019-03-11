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

<div class="form">
    <?php

    echo "<div class='submit-checkout'>";
    echo "<h2>Contact information</h2>";

    //posts input values from form on index.php
    echo "<p class='form-submit'>Name: " . $_POST['name'] . "<br />\n</p>";

    echo "<p class='form-submit'>Address: " . $_POST['address'] . "<br />\n</p>";

    echo "<p class='form-submit'>Email: " . $_POST['email'] . "<br />\n</p>";

    echo "<p class='form-submit'>Phone number: " . $_POST['phone'] . "<br />\n</p>";
    echo "</div>";

    echo "<h2>You have selected the following products:</h2>";



      foreach ( $products as $product ) {
          //checks if value has been entered in input number field
        if($_POST[$product["counter"] . '_counter'] > 0){

            

            //prints out products chosen
            echo "Product: " . $product["name"] . "<br>";
            //declares variable to store the price that has passed through function
            $calculated_price = check_prices($product["price"], $today_is);
            echo "Price per product: " . $calculated_price . " SEK<br>";
            echo "Quantity : " . $_POST[$product["counter"] . '_counter'] . "<br>";
            //calculates the total price of products chosen
            $total_price = ($_POST[$product["counter"] . '_counter'] * $calculated_price);
            echo "<p class='text-checkout'>Total price: " . $total_price . " SEK</p><br>";
            
            // gets the total price from every iteration, stacks them and stores them in variable
            $collected_prices += $total_price;

        } 
           //needs to be fixed - if no products are chosen
        // else if ($_POST[$product["counter"] . '_counter'] <= 0){
        //     echo "Order not completed, please return to previous page to pick items.";
        //     break;
        // }

    }

    echo "<h3>Total sum: " . $collected_prices . " SEK</h3>";


    ?>
    </div>
    </div>
</body>
</html>
