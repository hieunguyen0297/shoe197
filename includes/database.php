<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: database.php
 * Description:
 */


define parameters
$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "***";
$tableShoes = "***";
$tableSizes = "***";
$tableTypes = "***";


//connect to the mysql server
$conn = @new mysqli($host, $login, $password, $database);

if ($conn->connect_errno) {
   $error = $conn->connect_error;
   header("Location: error.php?m=$error");
   die();
}

// $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
// $cleardb_server = $cleardb_url["host"];
// $cleardb_username = $cleardb_url["user"];
// $cleardb_password = $cleardb_url["pass"];
// $cleardb_db = substr($cleardb_url["path"],1);
// $active_group = 'default';
// $query_builder = TRUE;
// // Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
