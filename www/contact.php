<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/19/2021
 * File: contact.php
 * Description:
 */

$page_title = "Contact";
require_once '../includes/header.php';
//get customer fistname
$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);


?>

    <div style="padding-top: 10px;
    padding-bottom: 10px;
    width: 1400px;
    margin: 0 auto;
    background-color: #f5f4f0;">
        <h3>Thank you for contacting us, <span style="font-size: 20px; font-weight: 800"><?= $firstname ?></span>. We
            will response to you as soon as possible. Have a great day ! </h3>
        <div>
            <img style="width: 500px" src="../image/plane.gif" alt="">
        </div>
    </div>


<?php

require_once '../includes/footer.php';
?>