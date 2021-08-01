<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/12/2021
 * File: home.php
 * Description:
 */ ?>


<?php
$page_title = "Home Page";
require_once '../includes/header.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page_title ?></title>
</head>
<body>

<div class="showcase">
    <div class="discover">
        <div>
            <h1 id="discovertitle">Discover</h1>
            <h3 id="discovertext">A shoe that demands attention by defying convention.</h3>

        </div>

        <button class="btn-shopnow"><a href="productspage.php" style="text-decoration: none">Shop Now</a></button>
    </div>

    <div class="shoeimage">

        <img src="../image/shoe1-removebg-preview.png" alt="" class="imageShowcase">
    </div>
</div>

<?php
require_once '../includes/footer.php';
?>
</body>
</html>


