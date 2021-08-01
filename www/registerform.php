<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/19/2021
 * File: registerform.php
 * Description:
 */


//set page title
$page_title = "Register";

require_once '../includes/header.php';


?>


    <div style="padding-top: 10px;
    padding-bottom: 20px;
    width: 1400px;
    margin: 0 auto;
    background-color: #f5f4f0;display: flex; justify-content: center">

        <form action="register.php" method="post"
              style="width: 50%; position: relative;  margin-top: 10px; padding: 20px 0 30px; background-color: white ; box-shadow: 5px 5px 8px 5px #888888;">
            <h2>Become A Member</h2>
            <div>
                <p style="width: 50%; margin-left: 170px ">Create an account with us to get access to the best products
                    and services. </p>
            </div>


            <div>
                <input style="width: 50%; height: 30px; margin-bottom: 10px;" type="text" name="firstname" required
                       placeholder="First Name">
            </div>
            <div>
                <input style="width: 50%; height: 30px; margin-bottom: 10px" type="text" name="lastname" required
                       placeholder="Last Name">
            </div>
            <div>
                <input style="width: 50%; height: 30px; margin-bottom: 10px" type="email" name="email" required
                       placeholder="Email">
            </div>

            <div>
                <input style="margin-bottom: 10px; width: 50%; height: 30px" type="password" name="password"
                       required placeholder="Password">
            </div>

            <input style=" width: 51%; padding: 10px 0; background-color: black; color: white; cursor: pointer"
                   type="submit"
                   value="Join Us">

            <div>
                <p>Have an account? <a href="loginform.php">Sign In</a></p>
            </div>
        </form>

    </div>

<?php
require_once '../includes/footer.php';
?>