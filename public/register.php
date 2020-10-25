<?php require_once("../private/initialize.php"); ?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <h2>Register Now!</h2>
        <form action="newuser.php" method="post">
            <label>&ast;Name:</label><input type="text" name="Name"  id="Name" onchange="validateName()" required ><br><br>
            <label>&ast;Email:</label><input type="text" name="Email"  id="Email"  onchange="validateEmail()" required><br><br>
            <label>&ast;Contact No:</label><input type="text" name="Contact"  id="Contact"  onchange="validateContact()" required><br><br>
            <!-- Please write JS function to:
                    1) Validate password with at least length 8, contain at least 1 number 1 upper and 1 lower
                    2) The password and confirm password are the same.
            -->
            <label>&ast;Password: </label><input type="password" name="Password" id="Password" rows="4" cols="40"  required ></input> <br>
            <label>&ast;Confirm Password: </label><input type="password" name="CPassword" id="CPassword" rows="4" cols="40"  required ></input> <br>
            <input type="checkbox" id="Check" name="Check" required><span>I agree to the Yum Yum Bakery Terms & Conditions</span><br><br>
            <input type="submit" name="Submit" id="Submit" value="Register" > <br><br>
        </form>

        <i><small>
            Already have an account? <a href="login.php">Login Now!</a>
        </small></i>
    </div>
<?php include(SHARED_PATH . "/public_footer.php"); ?>