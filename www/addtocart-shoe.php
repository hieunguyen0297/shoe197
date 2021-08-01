<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/16/2021
 * File: addtocart.php
 * Description:
 */

//Start a new session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//initiate id variable
$id = '';

//retrieve book id, if book id is empty, display and error
if (filter_has_var(INPUT_GET, "id")) {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
}

//if book id is empty, it is invalid
if (!$id) {
    $error = "Invalid shoe id detected. Operation cannot proceed.";
    header("Location: error.php?m=$error");
    die();
}

//get size
$size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_NUMBER_INT);


if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
    $_SESSION['cart'][$count] = array('id' => $id, 'size' => $size);


} else {

    $_SESSION['cart'][0] = array('id' => $id, 'size' => $size);

}


//redirect to the showcart.php page
header("Location: cart.php?size=$size");




