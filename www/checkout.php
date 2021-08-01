<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/18/2021
 * File: checkout.php
 * Description:
 */

require_once '../includes/header.php';

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

//make sure the user login first
if (!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}

?>


<div style="padding-top: 20px;
     padding-bottom: 20px;
     width: 1400px; /* or a percentage, or whatever */
margin: 0 auto; /* for the rest */
background-color: #f5f4f0;">

    <h2>Thank you for shopping with us.</h2>
</div>




<?php
$_SESSION['cart'] = array();
require_once '../includes/footer.php';
?>