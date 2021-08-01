<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/14/2021
 * File: updateshoe.php
 * Description:
 */

require_once '../includes/database.php';


if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve shoe id. Do not proceed if id was not found.
if (!filter_has_var(INPUT_POST, 'id')) {
    $error = "There was a problem retrieving shoe id.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);


//retrieve shoe details
$shoe_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'shoe_name', FILTER_SANITIZE_STRING)));
$shoe_type_id = $conn->real_escape_string(trim(filter_input(INPUT_POST, "shoe_type_name", FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING)));
$shoe_description = $conn->real_escape_string(trim(filter_input(INPUT_POST, "shoe_description", FILTER_SANITIZE_STRING)));


//make a sql UPDATE statement to update table shoes

$sql = "update $tableShoes set shoe_name = '$shoe_name', type_id = '$shoe_type_id', image = '$image', shoe_description ='$shoe_description' where shoe_id = $id";

//execute the update statement
$query = $conn->query($sql);

if (!$query) {
    $error = "Update failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}


//close database
$conn->close();
header("Location: productdetailpage.php?id=$id&m=update");

