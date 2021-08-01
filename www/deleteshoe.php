<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: deleteshoe.php
 * Description:
 */
require_once '../includes/check_admin.php';

if (!is_admin()) {
    $error = "Only administrator has access to this page";
    header("Location: error.php?m=$error");
    exit();
}

$page_title = "Delete Shoe";

require_once '../includes/header.php';
require_once '../includes/database.php';

if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving shoe id";
    header("Location:  error.php?m=$error");
    die();
};


$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//define a sql statement to delete the shoe from table shoes

$sql = "delete from $tableShoes where shoe_id = $id";

//execute the statement
$query = $conn->query($sql);


//make another statement to delete shoe size from table sizes
$sql1 = "delete from $tableSizes where  shoe_id = $id";

//execute the statement
$query1 = $conn->query($sql1);


if (!$query || !$query1) {
    $error = "Delete Failed: " . $conn->error;
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

        <h2>The product has been deleted successfully</h2>
        <div>
            <p style="font-size: 20px">Go to products page</p>
            <a href="productspage.php">Click Here</a>
        </div>

    </div>

<?php
$conn->close();
require_once '../includes/footer.php';

?>