<?php require_once("../private/initialize.php"); ?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <h2>Login and Order</h2>
        <form action="authenticate" method="post">
            
            <label>&ast;Email:</label><input type="text" name="Email"  id="Email"  onchange="validateEmail()" required><br><br>
            <label>&ast;Password: </label><input type="password" name="Password" id="Password" rows="4" cols="40"  required ></input> <br>

            <input type="submit" name="Submit" id="Submit" value="Login" > <br><br>
        </form>

        <i><small>
            Not having an account? <a href="register.php">Register Now!</a>
        </small></i>
    </div>
<?php include(SHARED_PATH . "/public_footer.php"); ?>