<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: productspage.php
 * Description:
 */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products Page</title>
</head>
<body>
<?php
require_once '../includes/header.php';

require_once '../includes/database.php';

//make a select statement to get the products
$sql = "select shoe_id, shoe_name, name, image from $tableShoes, $tableTypes where $tableShoes.type_id = $tableTypes.type_id";

//execute the query
$query = $conn->query($sql);


//check if the query is okay
if (!$query) {
    $error = "Select Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//get user role
$role = 0;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}


?>


<div class="productspage">

    <div>
        <h1 style="font-size: 50px; font-weight: 1000">Our Products</h1>
    </div>
    <?php if ($role == 1) { ?>
        <div>
            <h3>Want to add a shoe? <a href="../www/addshoe.php">Click Here</a></h3>
        </div>

    <?php } ?>
    <div class="productsflex">

        <div class="products">
            <?php while ($row = $query->fetch_assoc()) { ?>
                <div class="productscard">
                    <div>
                        <a href="productdetailpage.php?id=<?= $row['shoe_id'] ?>"><img src="<?= $row['image'] ?>" alt=""
                                                                                       style="width: 260px; height: 250px; margin-top: 10px; border-radius: 30px"></a>
                    </div>
                    <div style="height: 80px">
                        <h1 style="font-size: 30px"><?= $row['shoe_name'] ?></h1>
                    </div>
                    <div>
                        <h3><?= $row['name'] ?></h3>
                    </div>
                    <div>
                        <i class="fas fa-star" style="color: #ffb951"></i>
                        <i class="fas fa-star" style="color: #ffb951"></i>
                        <i class="fas fa-star" style="color: #ffb951"></i>
                        <i class="fas fa-star" style="color: #ffb951"></i>
                        <i class="fas fa-star" style="color: #ffb951"></i>
                    </div>
                    <p>$20.99 - 39.99</p>
                    <div style="padding-top: 10px; padding-bottom: 10px; background-color: #402c08; border-bottom-left-radius: 15px; border-bottom-right-radius: 15px ">
                        <a href="productdetailpage.php?id=<?= $row['shoe_id'] ?>"
                           style="text-decoration: none; font-size: 20px; color: white">More Details</a></div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

<?php
require_once '../includes/footer.php';
?>
</body>
</html>