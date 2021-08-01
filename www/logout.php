<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/18/2021
 * File: logout.php
 * Description:
 */


//if the session have not started, start it
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//unset all the session variable
$_SESSION = array();


//delete the session cookie
setcookie(session_name(), "", time() - 3600);

//destroy the session
session_destroy();


//redirect back to home page
header("Location: home.php");