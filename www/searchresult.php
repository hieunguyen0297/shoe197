<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/14/2021
 * File: searchresult.php
 * Description:
 */

$page_title = "Products Filter";

require_once '../includes/header.php';
require_once '../includes/database.php';


if (!filter_has_var(INPUT_GET, "search")) {
    $error = "There were no search input";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}


//get the search input
$input = filter_input(INPUT_GET, "search", FILTER_SANITIZE_STRING);

//split the search input and put it into an array
$searchInputs = explode(" ", $input);

//select statement using pattern search.
$sql = "select shoe_id, shoe_name, name, image from $tableShoes, $tableTypes where $tableShoes.type_id = $tableTypes.type_id AND ";

foreach ($searchInputs as $in) {
    $sql .= "shoe_name LIKE '%$in%' AND ";
}

//remove the extra "AND " at the end of string
$sql = rtrim($sql, "AND ");


//execute the query
$query = $conn->query($sql);


//check the query
if (!$query) {
    $error = "Select Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

?>

    <div style="padding-top: 20px;
    padding-bottom: 20px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0;">

        <?php
        if ($query->num_rows == 0) {
            echo "<h2>There is no result for '$input'</h2>";
            require_once '../includes/footer.php';
            exit();
        }

        ?>
        <h2>Search result for '<?= $input ?>'</h2>
        <div class="productsflex">

            <div class="products">
                <?php while ($row = $query->fetch_assoc()) { ?>
                    <div class="productscard">
                        <div>
                            <a href="productdetailpage.php?id=<?= $row['shoe_id'] ?>"><img src="<?= $row['image'] ?>"
                                                                                           alt=""
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