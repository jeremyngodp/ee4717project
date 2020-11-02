<?php 
    require_once("../private/initialize.php"); 

    session_start();

  // create short variable names
$name = $_POST['Name'];
$email = $_POST['Email'];
$message = $_POST['Message'];
$contactno = $_POST['Contact'];
$currentdate = date_format(date_create("Asia/Singapore"),"Y-m-d");


  if (!$name || !$email || !$message || !$contactno) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }


 $query = "insert into contact values
            ('".$name."', '".$email."','".$contactno."','".$message."',  '".$currentdate."')";
 $result = $db->query($query);

  if (!$result) {
      $_SESSION['message'] = "Your message has been received";
  } else {
    $_SESSION['message'] = "Error sending your feedback, please try again later!";
  }


 redirect_to('contact.php');

?>