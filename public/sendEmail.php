<?php require_once("../private/initialize.php"); 
    if(!isset($_POST['Name']) || !isset($_POST['Email']) || !isset($_POST['Message']) || !isset($_POST['Contact']) ) {
        redirect_to('contact.php');
    }

    else {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $message = $_POST['Message'];
        $contact = $_POST['Contact'];

        $subject = 'FROM: ' . $name . ' - ' . $email . ' - Number: ' . $contact;
        
        mail("ngodatphuc.ce@gmail.com",$subject, $message);
        redirect_to('menu.php');
    }

?>

