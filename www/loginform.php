<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/18/2021
 * File: loginform.php
 * Description:
 */


$page_title = "Login";

require_once '../includes/header.php';


$message ='';

if(isset($_GET['m'])){
    $message = $_GET['m'];
}



?>


    <div style="padding-top: 20px;
    padding-bottom: 40px;
    width: 1400px; /* or a percentage, or whatever */
    margin: 0 auto; /* for the rest */
    background-color: #f5f4f0; display: flex; justify-content: center">
        <div style="background-color: white; width: 60%; padding: 20px 0px; display: flex; box-shadow: 0 10px 15px -2px gray;">
            <form action="login.php" method="post"
                  style="width: 50%; position: relative;  margin-top: 20px; padding: 20px 0 30px">
                <h1>Sign In</h1>

                <?php if ($message) {?>
                <div>
                    <p style="background-color: red; width:72%; margin-left: 58px; color: white; padding: 10px 0"><?= $message?></p>
                </div>
                <?php }?>

                <div>
                    <input style="width: 70%; height: 30px; margin-bottom: 10px" type="email" name="email" required
                           placeholder="Email">
                </div>

                <div>
                    <input style="margin-bottom: 10px; width: 70%; height: 30px" type="password" name="password"
                           required placeholder="Password">
                </div>

                <input style=" width: 72%; padding: 10px 0; background-color: #f7e9a1; cursor: pointer" type="submit"
                       value="Sign In">

                <div style="display: flex; padding-left: 20px; padding-right: 20px; justify-content: space-around; top: 60px; align-items: center; margin-top: 20px">
                    <div style="width: 130px; height: 3px;background-color: black"></div>
                    <div>OR</div>
                    <div style="width: 130px; height: 3px;background-color: black"></div>
                </div>

                <div>
                    <input style="padding: 10px 20px; margin-top: 16px; background-color: #3F3F3D; cursor: pointer; color: white;"
                           type="button" value="Create an Account" onclick="window.location.href='registerform.php'">
                </div>
            </form>

            <div style="width: 50%">
                <img style="width: 360px;height: 300px; " src="../image/locks.gif" alt="">
            </div>


        </div>


    </div>

<?php
require_once '../includes/footer.php';
?>