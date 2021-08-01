<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/14/2021
 * File: addshoe.php
 * Description:
 */

require_once '../includes/check_admin.php';

if(!is_admin()){
    $error = "Only administrator has access to this page";
    header("Location: error.php?m=$error");
    exit();
}

$page_title = "Add Shoe";



require_once '../includes/header.php';


?>


<div style="padding-top: 20px;
    padding-bottom: 20px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0;">

    <h1>Add Shoe</h1>
    <div style="padding-top: 20px; padding-bottom: 20px; display: flex; justify-content: center">

        <form action="insertshoe.php" method="post">
            <div style="display: flex">
                <div style="text-align: left; margin-top: 8px">
                    <div><h3>Shoe Name: </h3></div>
                    <div><h3>Shoe Type Name: </h3></div>

                    <div style="margin-top: 30px"><h3>Image: </h3></div>

                    <div style="margin-top: 10px;"><h3>Shoe Description: </h3></div>
                </div>
                <div style="text-align: left">
                    <div><input style="margin-top: 20px; margin-left: 20px; height: 25px" type="text"
                                value="" name="shoe_name" required></div>
                    <div style="margin-top: 20px; margin-left: 20px">
                        <select style=" height: 30px" name="shoe_type_name" required>
                            <option value="1">Dress</option>
                            <option value="2">Sneaker</option>
                        </select>
                    </div>

                    <div><input style="margin-top: 20px; margin-left: 20px; height: 25px; width: 400px" type="text"
                                name="image" value="" required></div>

                    <div><textarea style="margin-top: 20px; margin-left: 20px" name="shoe_description" id=""
                                   cols="50"
                                   rows="5" required></textarea></div>
                </div>
            </div>
            <div style="margin-top: 20px">

                <input style="padding: 8px 15px; background-color: #3f4349; color: white" type="submit"
                       value="Add">
                <input style="padding: 8px 12px; background-color: #3f4349; color: white" type="button"
                       onclick="window.location.href='productspage.php'" value="Cancel">
            </div>
        </form>
    </div>
</div>
<?php

require_once '../includes/footer.php';
?>