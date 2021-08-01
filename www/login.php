<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/18/2021
 * File: login.php
 * Description:
 */

require_once '../includes/database.php';


//start session if it has not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//initialize variables for email and password
$email = $password = '';

//retrieve email and password input from the submited form
if (isset($_POST['email'])) {
    $email = $conn->real_escape_string(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING)));
}

if (isset($_POST['password'])) {
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
}


//make a request to database to validate user
$sql = "select * from users where email = '$email' and password = '$password'";

//execute the statement
$query = $conn->query($sql);

//if user not found in the database, return a message
if ($query->num_rows == 0) {
    $message = "Email or password is incorrect !";
    $conn->close();
    header("Location: loginform.php?m=$message");
    exit();
}


//It is a valid user. Need to store the user in session variables
$row = $query->fetch_assoc();
$_SESSION['login'] = $email;
$_SESSION['role'] = $row['role'];
$_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];


//close connection
$conn->close();

//redirect to home page
header("Location: home.php");

