<?php 
require_once("../private/initialize.php"); ?>


<!DOCTYPE html>

<?php include( SHARED_PATH . "/public_header.php"); ?>

    <div class="wrapper">
        <div class="box1">
            <div class="box1content">
                <h1>Contact Us</h1>
                
                <p>Please contact us if you have any feedback or enquiries. We will attend to your request soonest possible, thank you!</p><br>
                
                <form  action="processcontactform.php" method="post"id="contactform"> <!-- action="sendEmail.php" -->
                    <label>&ast;Name:</label><input type="text" name="Name"  id="Name" onchange="validateName()" required ><br><br>
                    <label>&ast;Email:</label><input type="text" name="Email"  id="Email"  onchange="validateEmail()" required><br><br>
                    <label>&ast;Contact No:</label><input type="text" name="Contact"  id="Contact"  onchange="validateContact()" required><br><br>
                    <label>&ast;Message: </label><textarea type="textarea" name="Message" id="Message" rows="4" cols="40"  required ></textarea> <br>

                    <input type="checkbox" id="Check" name="Check" required><span>I agree to the Yum Yum Bakery Terms & Conditions</span><br><br>


                    <input type="submit" name="Submit" id="Submit" value="SUBMIT" > <br><br>
                </form>
          

                <!--Considering Changing the Form to this, as I cant figure a way to email with PHP -->
                <a href="mailto:ngodatphuc.ce@gmail.com">Or email us!
               </a>
            </div> <!-- box1content -->
        </div> <!-- box1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>

