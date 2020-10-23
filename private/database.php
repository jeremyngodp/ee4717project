<?php 
    require_once("db_credentials.php");

    function confirm_db_connect(){
        if(mysqli_connect_errno()) {
            echo 'ERROR: Could not connect to the database!';
            exit;
        }
    }

    function confirm_result_set($result_set) {
        if (!$result_set) {
            echo("Database query failed.");
        }
    }

    
?>