<?php require_once("../private/initialize.php"); 
    session_start();
    if (isset($_SESSION['user'])){
        redirect_to('menu.php');
    }

    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $c_password = $_POST['CPassword'];
    $fullname = $_POST['Name'];
    $contact = $_POST['Contact'];

    if($password != $c_password) {

        $_SESSION['message'] ="Password and Confirm Password not matching";
        redirect_to('register.php');
    }

    else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $new_userID = addUser($email,$hashed_password, $fullname, $contact, 0);
        if(!$new_userID){
            $_SESSION['message'] ="Failed to register New User with email " . $email;
            redirect_to('register.php'); 
        } else {
            $new_user = ['id' => $new_userID, 'role' => 'USER'];
            $_SESSION['user'] = $new_user;
            redirect_to('welcomenewuser.php');
        }
    }
?>