<?php require_once("../private/initialize.php"); 
    
    if (isset($_POST['item'])) {
        $id = $_POST['item'];
    }

    if (isset($_POST['itemName'])) {
        $name = $_POST['itemName'];
    }

    if (isset($_POST['itemPrice'])) {
        $price = $_POST['itemPrice'];
    }

    if (isset($_POST['description'])) {
        $description = $_POST['description'];
    }

    if (isset($_POST['availability'])) {
        $available = $_POST['availability'];
    }

    updateItem($id, $name, $description, $price, $available);

    redirect_to('menu.php');

?>