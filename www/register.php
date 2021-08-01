<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/18/2021
 * File: register.php
 * Description:
 */


require_once '../includes/database.php';


if (!$_POST) {
    $error = "There is something wrong. Please try again !";
    header("Location: error.php?m=$error");
    die();
}


//set role to a regular user
$role = 2;


//retrieve data from post

$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING)));
$email = $conn->real_escape_string(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));


//make a insert statement
$sql = "insert into users (firstname, lastname, email, password, role) values ('$firstname', '$lastname', '$email', '$password', $role )";

//execute the statement
$query = $conn->query($sql);


//check the result
if (!$query) {
    $error = "Insert Failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}


//close connection
$conn->close();


//redirect back to login
header("Location: loginform.php");