<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/13/2021
 * File: error.php
 * Description:
 */

require_once '../includes/header.php';
$error='Default error.';
if (filter_has_var(INPUT_GET, "m")) {
    $error = filter_input(INPUT_GET, 'm', FILTER_SANITIZE_STRING);
}
?>

<div style="padding-top: 20px;
    padding-bottom: 20px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0;">
    <h2>Error</h2>

    <table style="width: 100%; border: none">
        <tr>
            <td style="vertical-align: middle; text-align: center; width:100px">
                <img src='../image/error.png' style="width: 80px; border: none"/>
            </td>
            <td style="text-align: left; vertical-align: top;">
                <h3>Sorry, but an error has occurred.</h3>
                <div style="color: red">
                    <?= $error ?>
                </div>
                <br>
            </td>
        </tr>
    </table>
</div>

<?php
require_once '../includes/footer.php';
?>