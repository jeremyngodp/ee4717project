<?php require_once("../private/initialize.php"); 
    
    session_start();

    if (isset($_SESSION['user'])){
        redirect_to('menu.php');
    }

    $user = findUserByEmail($_POST['Email']) -> fetch_assoc();
    if (!isset($user)) {
        $_SESSION['message'] = "User Not Found";
        redirect_to("login.php");
    }

    else {
        
        if (password_verify($_POST['Password'], $user['h_password'])) {
            
            $loggedInUser =  array ('id' => $user['id'], 'role' => $user['user_role']);
            
            $_SESSION['user'] = $loggedInUser;
            
            redirect_to('menu.php');
        }

        else {
            $_SESSION['message'] = "Login Failed";
            redirect_to('login.php');
        }
    }
    
?>