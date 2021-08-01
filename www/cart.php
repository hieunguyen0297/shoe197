<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: cart.php
 * Description:
 */


$page_title = "Cart";
require_once '../includes/header.php';
require_once '../includes/database.php';


if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "<h2 class='wrapper' style='text-align: center'><br>Your shopping cart is empty.<br><br></h2>";
    require_once '../includes/footer.php';
    exit();
}

$cart = $_SESSION['cart'];

//print_r($cart);

?>

<?php

$sql1 = "select shoe_id, shoe_name, image from shoes where 0";
$sql2 = "select price, shoe_size from sizes where 0";


foreach (array_keys($cart) as $key) {
    $valueid = $cart[$key]['id'];
    $valuesize = $cart[$key]['size'];
    $sql1 .= " or shoe_id = $valueid";
    $sql2 .= " or shoe_id= $valueid and shoe_size = $valuesize";

}

//execute the query
$query1 = $conn->query($sql1);
$query2 = $conn->query($sql2);

?>

<div style=" padding-top: 20px;
     padding-bottom: 20px;
     width: 1400px; /* or a percentage, or whatever */
margin: 0 auto; /* for the rest */
background-color: #f5f4f0;">
    <h1>Order </h1>
    <div style="display: flex">
        <div style="width: 30%"><h3>Item Image</h3></div>
        <div style="width: 30%"><h3>Item Name</h3></div>
        <div style="width: 30%"><h3>Item Size</h3></div>
        <div style="width: 30%"><h3>Item Price</h3></div>

    </div>
    <?php
    //use a WHILE loop to retrieve all shoes and display them in a HTML table.
    $total = 0;
    while ($row1 = $query1->fetch_assoc() and $row2 = $query2->fetch_assoc()) {
        $shoe_id = $row1['shoe_id'];
        $shoe_name = $row1['shoe_name'];
        $image = $row1['image'];
        $price = $row2['price'];
        $size = $row2['shoe_size'];
        $total = $total + $price;

        ?>
        <div style="display: flex; justify-content: center; align-items: center">
            <div style="width: 30%"><img style="width: 90px" src="<?= $image ?>" alt=""></div>
            <div style="width: 30%"><h2><a style="text-decoration: none"
                                           href='productdetailpage.php?id=<?= $shoe_id ?>'><?=
                        $shoe_name ?></a></h2></div>
            <div style="width: 30%"><?= $size ?></div>
            <div style="width: 30%">$<?= $price ?></div>

        </div>


    <?php } ?>
    <div style="text-align: right; margin-right: 150px">
        <h1>Total: <?= $total ?></h1>
        <input style="padding: 8px 12px; background-color: black; color: white" type="button" value="Checkout"
               onclick="window.location.href = 'checkout.php'"/>
        <input style="padding: 8px 12px" type="button" value="Cancel"
               onclick="window.location.href = 'productspage.php'"/>
    </div>


</div>

<?php

require_once '../includes/footer.php';
?>

