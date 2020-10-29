<?php require_once("../private/initialize.php"); 
    session_start();
    if (isset($_SESSION['user'])){
        redirect_to('menu.php');
    }
?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <div class="box1">
            <div class="box1content">
        <h1>Login and Order</h1>
        <form action="authenticate.php" method="post" id="loginform">
            
            <label>&ast;Email:</label><input type="text" name="Email"  id="Email"  onchange="validateEmail()" required><br><br>
            <label>&ast;Password: </label><input type="password" name="Password" id="Password" rows="4" cols="40"  required ></input> <br><br>

            <input type="submit" name="Submit" id="Submit" value="Login" > <br><br>
        </form>

        <i><small>
            Don't have an account? <a href="register.php">Register Now!</a><br>
        </small></i>
        </div> <!-- box1content -->
        </div> <!-- box1 -->
    </div> <!-- wrapper -->
<?php include(SHARED_PATH . "/public_footer.php"); ?>