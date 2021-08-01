<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/14/2021
 * File: insertshoe.php
 * Description:
 */

require_once '../includes/database.php';


if (!$_POST) {
    $error = "Access not allowed";
    header("Location: error.php?m=$error");
    die();
}


if (!filter_has_var(INPUT_POST, "shoe_name") || !filter_has_var(INPUT_POST, "shoe_type_name") || !filter_has_var(INPUT_POST, "image") || !filter_has_var(INPUT_POST, "shoe_description")) {
    $error = "Something wrong";
    header("Location:  error.php?m=$error");
    die();
}

//retrieve shoe details
$shoe_name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'shoe_name', FILTER_SANITIZE_STRING)));
$shoe_type_id = $conn->real_escape_string(trim(filter_input(INPUT_POST, "shoe_type_name", FILTER_DEFAULT)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING)));
$shoe_description = $conn->real_escape_string(trim(filter_input(INPUT_POST, "shoe_description", FILTER_SANITIZE_STRING)));


//make a sql statement to insert the new shoe
$sql = "insert into $tableShoes values (NULL ,'$shoe_name', '$shoe_description', '$image', '$shoe_type_id')";

//execute the query
$query = $conn->query($sql);

if (!$query) {
    $error = "Insert Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

//insert id
$id = $conn->insert_id;

//close the database
$conn->close();
//redirect back to products page
header("Location: productspage.php");
