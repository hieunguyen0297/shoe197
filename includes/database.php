<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: database.php
 * Description:
 */


//define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "shoes";
$tableShoes = "shoes";
$tableSizes = "sizes";
$tableTypes = "types";


//connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

if ($conn->connect_errno) {
    $error = $conn->connect_error;
    header("Location: error.php?m=$error");
    die();
}