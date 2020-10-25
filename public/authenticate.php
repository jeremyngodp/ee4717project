<?php require_once("../private/initialize.php"); 
    
    session_start();

    if (isset($_SESSION['user'])){
        unsset($_SESSION['user']);
    }

    $user = findUserByEmail($_POST['Email']) -> fetch_assoc();
    if (!isset($user)) {
        echo "<p>User not found!</p>";
        redirect_to("login.php");
    }

    else {
        
        if (password_verify($_POST['Password'], $user['h_password'])) {
            
            $loggedInUser =  array ('id' => $user['id'], 'role' => $user['user_role']);
            
            $_SESSION['user'] = $loggedInUser;
            
            redirect_to('menu.php');
        }

        else {
            echo "<p>Login failed</p>";
            redirect_to('login.php');
        }
    }
    
?>