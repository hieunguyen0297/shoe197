<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: editshoe.php
 * Description:
 */
require_once '../includes/check_admin.php';

if (!is_admin()) {
    $error = "Only administrator has access to this page";
    header("Location: error.php?m=$error");
    exit();
}

$page_title = "Edit Shoe";
//bring in the header
require_once '../includes/header.php';
//connect to database
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
$sql = "select shoe_id, shoe_name, name,shoe_description, image, description from $tableShoes, $tableTypes where $tableShoes.type_id = $tableTypes.type_id and shoe_id = $id";


$query = $conn->query($sql);

if (!$query) {
    $error = "Select Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();

?>

    <div style="padding-top: 20px;
    padding-bottom: 20px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0;">


        <h1 style="background-color: #f5f4f0;">Update Shoe</h1>
        <div style="padding-top: 20px; padding-bottom: 20px; display: flex; justify-content: center">

            <form action="updateshoe.php" method="post">
                <div style="display: flex">
                    <div style="text-align: left; margin-top: 8px">
                        <div><h3>Shoe Name: </h3></div>
                        <div><h3>Shoe Type Name: </h3></div>

                        <div style="margin-top: 30px"><h3>Image: </h3></div>

                        <div style="margin-top: 10px;"><h3>Shoe Description: </h3></div>
                    </div>
                    <div style="text-align: left">
                        <div><input style="margin-top: 20px; margin-left: 20px; height: 25px" type="text"
                                    value="<?= $row['shoe_name'] ?>" required name="shoe_name"></div>
                        <div style="margin-top: 20px; margin-left: 20px">
                            <select style=" height: 30px" name="shoe_type_name">
                                <option value="1" <?= $row['name'] == 'Dress' ? 'selected' : ''; ?>>Dress</option>
                                <option value="2" <?= $row['name'] == 'Sneaker' ? 'selected' : ''; ?>>Sneaker</option>
                            </select>
                        </div>

                        <div><input style="margin-top: 20px; margin-left: 20px; height: 25px; width: 400px" type="text"
                                    name="image" value="<?= $row['image'] ?>"></div>

                        <div><textarea style="margin-top: 20px; margin-left: 20px" name="shoe_description" id=""
                                       cols="50"
                                       rows="5"><?= $row['shoe_description'] ?></textarea></div>
                    </div>
                </div>
                <div style="margin-top: 20px">
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    <input style="padding: 8px 12px; background-color: #3f4349; color: white" type="submit"
                           value="Update">
                    <input style="padding: 8px 12px; background-color: #3f4349; color: white" type="button"
                           onclick="window.location.href='productdetailpage.php?id=<?= $id ?>'" value="Cancel">
                </div>
            </form>
        </div>

    </div>

<?php
require_once '../includes/footer.php';
?>