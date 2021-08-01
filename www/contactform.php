<?php
/**
 * Author: Hieu Nguyen
 * Date: 6/19/2021
 * File: contactform.php
 * Description:
 */

//set title
$page_title = 'Contact Us';
require_once '../includes/header.php';


?>

    <div style="padding-top: 10px;
    padding-bottom: 20px;
    width: 1400px;
    margin: 0 auto;
    background-color: #f5f4f0;display: flex; justify-content: center; ">
        <form action="contact.php" method="post"
              style="width: 60%;   margin-top: 10px; padding: 20px 0 30px; background-color: white ; box-shadow: 5px 5px 8px 5px #888888;">
            <h2 style="text-align: left; margin-left: 20px">Send Us A Message</h2>

            <hr>

            <div style="display: flex; margin-top: 20px">
                <div style="width: 50%">
                    <input style="width: 90%; border-radius: 5px ; height: 30px; margin-bottom: 10px;" type="text"
                           name="firstname" required
                           placeholder="Your first name">
                </div>
                <div style="width: 50%">
                    <input style="border-radius: 5px ; width: 90%;height: 30px; margin-bottom: 10px" type="text"
                           name="lastname" required
                           placeholder="Your last name">
                </div>
            </div>

            <div style="display: flex; margin-top: 10px">
                <div style="width: 50%">
                    <input style="width: 90%; border-radius: 5px ; height: 30px; margin-bottom: 10px;" type="text"
                           name="phone" required
                           placeholder="Enter your phone">
                </div>
                <div style="width: 50%">
                    <input style="border-radius: 5px ; width: 90%;height: 30px; margin-bottom: 10px" type="email"
                           name="email" required
                           placeholder="Enter your email">
                </div>
            </div>
            <div style="margin-top: 10px">

                <textarea style="border-radius: 5px;" name="" id="" cols="98" rows="6" placeholder="Write your message"
                          required></textarea>
            </div>
            <div style="text-align: left; margin-left: 15px">

                <input style=" width: 31%; padding: 10px 0; background-color: black; color: white; cursor: pointer; margin-top: 10px; border-radius: 5px"
                       type="submit"
                       value="Send Message">
            </div>

        </form>

    </div>


<?php

require_once '../includes/footer.php';
?>