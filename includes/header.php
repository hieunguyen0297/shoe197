<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/12/2021
 * File: header.php
 * Description:
 */ ?>



<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//creating a variable to store the number of items in the shopping cart.
$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}


//create variable for  login, name and role
$login = '';
$name = '';
$role = '';


if (isset($_SESSION['login']) and isset($_SESSION['name']) and isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="wrapper">
    <div class="navbar">
        <div class="text">
            <h1><i class="fas fa-shoe-prints"></i></h1>
        </div>

        <div class="cartloginsearch">
            <form action="../www/searchresult.php" method="get" class="header-form" style="display: flex">
                <input type="text" class="input" placeholder="Search by shoe name" name="search" required>
                <button type="submit" name="submit"
                        style="margin-left: 4px; padding: 0 10px; background-color: #3f4349; color: white; border-radius: 4px"><i
                            class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="link">
            <a href="../www/home.php">Home</a>
            <a href="../www/productsPage.php">Products</a>
            <a href="../www/contactform.php">Contact Us</a>

            <?php
            if (empty($login)) {
                ?>
                <a href="../www/loginform.php"><i class="fas fa-sign-in-alt"></i> Sing In</a>
            <?php } else { ?>

                <div style="display: flex; align-items: center;">
                    <h3 style="margin-right: 5px; color: #ff8632"><?= $name ?></h3> ||
                    <a style="margin-left: 5px; color: #ff8632" href="../www/logout.php">Sign Out</a>
                </div>


            <?php } ?>
            <a href="../www/cart.php"><i class="fas fa-shopping-cart fa-2x"><?= $count ?></i></a>
        </div>

    </div>

</div>


<?php


?>
</body>
</html>