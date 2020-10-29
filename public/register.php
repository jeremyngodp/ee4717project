<?php require_once("../private/initialize.php"); 
    session_start();
    if (isset($_SESSION['user'])){
        redirect_to('menu.php');
    }

?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
<link rel="stylesheet" href="css/passwordstyle.css">


    <div class="wrapper">
        <div class="box1">
            <div class="box1content">
        <h1>Register Now!</h1>
        <form action="newuser.php" method="post" id="newuserform">
            <label>&ast;Name:</label><input type="text" name="Name"  id="Name" onchange="validateName()" required ><br><br>
            <label>&ast;Email:</label><input type="text" name="Email"  id="Email"  onchange="validateEmail()" required><br>
            <label>&ast;Contact No:</label><input type="text" name="Contact"  id="Contact"  onchange="validateContact()" required><br><br>
            <!-- Please write JS function to:
                    1) Validate password with at least length 8, contain at least 1 number 1 upper and 1 lower
                    2) The password and confirm password are the same.
            -->
            <label>&ast;Password: </label><input type="password" name="Password" id="Password" rows="4" cols="40" onchange="validatePassword()" required ></input> <br>

                    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>

            <label>&ast;Confirm Password: </label><input type="password" name="CPassword" id="CPassword" rows="4" cols="40" onchange="confirmPassword()" required ></input> <br>

            <input type="checkbox" id="Check" name="Check" required><span>I agree to the Yum Yum Bakery Terms & Conditions</span><br><br>
            <input type="submit" name="Submit" id="Submit" value="Register" > <br>

        </form>


        <i><small>
            Already have an account? <a href="login.php">Login Now!</a>
        </small></i>

        </div> <!-- box1content -->
     </div> <!-- box1 -->
    </div> <!-- wrapper -->
    <script type="text/javascript" src="javascript/password.js"></script>
<?php include(SHARED_PATH . "/public_footer.php"); ?>