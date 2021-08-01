<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: productdetailpage.php
 * Description:
 */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
</head>
<body>
<?php
require_once '../includes/header.php';

require_once '../includes/database.php';

if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving the product.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//get current product id from the url string
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//make a select statement to get the current product
$sql1 = "select shoe_id, shoe_name, name,shoe_description, image , description from $tableShoes, $tableTypes where $tableShoes.type_id = $tableTypes.type_id and shoe_id = $id";

//make another sql statement to get size and price for the current product
$sql2 = "SELECT price, shoe_size FROM $tableSizes WHERE shoe_id = $id";

//execute 2 sql statement above
$query1 = $conn->query($sql1);
$query2 = $conn->query($sql2);

if (!$query1 || !$query2) {
    $error = "Select Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row1 = $query1->fetch_assoc();

if (!$row1) {
    $error = "Product not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}


//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//if the user has logged in, retrieve the user's role.
$role = 0;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}


?>


<div style="padding-top: 20px;
    padding-bottom: 20px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0; display: flex;">

    <div style="width: 50%">
        <img src="<?= $row1['image'] ?>" alt="" style="padding-top: 30px">
    </div>
    <form method="post" action="addtocart-shoe.php?id=<?= $id ?>" style="text-align: left">

        <div>
            <h1 style="font-size: 50px"><?= $row1['shoe_name'] ?></h1>
        </div>
        <div>
            <h2><?= $row1['name'] ?></h2>
        </div>
        <div>
            <i class="fas fa-star" style="color: #ffb951"></i>
            <i class="fas fa-star" style="color: #ffb951"></i>
            <i class="fas fa-star" style="color: #ffb951"></i>
            <i class="fas fa-star" style="color: #ffb951"></i>
            <i class="fas fa-star" style="color: #ffb951"></i>
        </div>

        <div style="margin-top: 20px ">

            <select name="size" style="padding: 6px 8px; font-size: 18px" required>
                <option value="">Select a size</option>
                <?php while ($row2 = $query2->fetch_assoc()) { ?>
                    <option value="<?= $row2['shoe_size'] ?>">Size <?= $row2['shoe_size'] ?> -
                        $<?= $row2['price'] ?></option>
                <?php } ?>
            </select>


        </div>


        <div style="width: 500px">
            <h3><?= $row1['description'] ?></h3>
        </div>
        <div style="width: 500px">
            <h3><?= $row1['shoe_description'] ?></h3>
        </div>
        <div>

            <!--            <a href="addtocart-shoe.php?id=--><? //=$id?><!--">add to cart</a>-->
            <input class="addtocart-btn"
                   style="padding: 10px 12px; margin-top: 20px; border-radius: 20px; border: 2px solid orange; background-color: black; color: white"
                   type="submit" value="ADD TO CART">
        </div>

        <div>
            <?php if ($role == 1) { ?>
                <input style="padding: 6px 10px; background-color: white; margin-top: 15px" type="button"
                       onclick="window.location.href='editshoe.php?id=<?= $id ?>'" value="Edit Shoe">

                <input style="padding: 6px 10px; background-color: white; margin-top: 15px" type="button"
                       onclick="window.location.href='deleteshoe.php?id=<?= $id ?>'" value="Delete Shoe">

            <?php } ?>
        </div>
    </form>
</div>

<?php require_once '../includes/footer.php' ?>
</body>
</html>