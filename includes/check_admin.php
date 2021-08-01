<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/19/2021
 * File: check_admin.php
 * Description:
 */


function is_admin()
{
    //start session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //get user's role
    if (isset($_SESSION['role'])) {
        $role = $_SESSION['role'];

    }

    return ($role == 1) ? true : false;
}