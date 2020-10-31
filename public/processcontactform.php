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

 //  if (!$result) {
        
 //      // echo "Your message has been submitted. Please wait for our team to get back to you!";
 //  } else {

 //  	  // echo "An error has occurred, please try again!";
 //  }


 redirect_to('contact.php');

?>