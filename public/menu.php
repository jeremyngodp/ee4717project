<?php 
    require_once("../private/initialize.php"); 
    session_start();

    // unset($_SESSION['user']);
    // unset($_SESSION ['item-id']);
    // unset($_SESSION['cart']);

    if(isset($_SESSION['user'])){
        // echo "cart length " . count($_SESSION['cart']) . "<br/>";
        
    
        if (isset($_GET['item']) && isset($_GET["quantity"])) {
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if(!isset($_SESSION['item-name'])) {
                $_SESSION['item-name'] = array();
            }
        
            if(!isset($_SESSION['item-price'])) {
                $_SESSION['item-price'] = array();
            }

            $item = $_GET['item'];
            $quantity = $_GET['quantity'];
            $name = $_GET['itemName'];
            $price = $_GET['itemPrice'];
            echo "item " . $item;
            echo " quantity ". $quantity;
            echo "<br/>";
            
            if (array_key_exists($item, $_SESSION['cart'])) {
                $_SESSION['cart'] [$item] += $quantity;
            }
    
            else {
                $_SESSION['cart'] += [$item => $quantity ];
                $_SESSION['item-name'] +=[$item => $name];
                $_SESSION['item-price'] +=[$item => $price];
            }
            
        }
    }
    

    // foreach($_SESSION['item-name'] as $key => $value ){
    //     echo $key . " => " . $value . "<br/>";
    // }

    // foreach($_SESSION['item-price'] as $key => $value ){
    //     echo $key . " => " . $value . "<br/>";
    // }

    // foreach($_SESSION['cart'] as $key => $value ){
    //     echo $key . " => " . $value . "<br/>";
    // }
    
    $category_list = findALLCategory();
    
?>
 
<?php include( SHARED_PATH . "/public_header.php"); ?>
<link rel="stylesheet" href="css/menustyle.css">
    <div class="wrapper">
        <div class="box1"> <!-- for whole segment of menu -->
            <div class="box1content"> <!-- contents within whole segment of menu -->



        <h1>Look Through our Menu</h1>
        <?php if (!isset($_SESSION['user'])) {
            echo '<a href="login.php">Login and Start Ordering now</a>';
        }
        ?>
        <div>
            <?php 
                while($category = $category_list->fetch_assoc()) {
                    echo '<div class="category">'; 
                    // category colour to separate contents
                    

                    echo '<h2>'. $category["cat_name"] .'</h2>'; 
                    if($_SESSION['user']['role'] == 0) {
                        $item_list = findDishByCategory($category["id"]);
                    }

                    else if ($_SESSION['user']['role'] == 1) {
                        $item_list = findDishByCategoryAdmin($category["id"]);
                    }
                    while ($item = $item_list->fetch_assoc()){

                        
                        echo '<div class ="column">';
                        echo '<h4>' . $item["dish_name"] . '</h4>';
                        $imgfile  = dirname(__FILE_) . '/menu photos/' . $item['id'] .'.jpg';
                        if(file_exists($imgfile)) {
                            echo '<img src="menu photos/' . $item['id'] .'.jpg" alt="Yum Yum Bakery!" class="categoryimage" id="center">';
                        }
                        else {
                            echo '<img src="media/logo.png" alt="Yum Yum Bakery!" class="categoryimage" id="center">';
                        }
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>' . $item["dish_description"] . '<br>';
                        echo "<h3>$" . $item["price"] . "</h3>";
                        echo '</th>';

                        echo '</tr>';
                        echo '</table>';

                        
                        
                        
                        if (isset($_SESSION['user'])){
                            if($_SESSION['user']['role'] == 0) {
                                echo '<form method="get" action=' . $_SERVER["PHP_SELF"].'>';

                                echo '<table>';
                                echo '<tr>';
                                echo '<td>Quantity: <input value="0" min="0" name="quantity" type="number"> <br/></td>';
                                echo '</tr>';
                                echo '</table>';

                                echo '<input value=' . $item["id"] . ' name="item" type="hidden"> <br/>';
                                echo '<input value="' . $item["dish_name"] . '" name="itemName" type="hidden"> <br/>';
                                echo '<input value="' . $item["price"] . '" name="itemPrice" type="hidden"> <br/>';
                                echo '<input value="Add to Cart"  type="submit" id="center">';
                                echo '<br><br></form>';
                            }

                            else if ($_SESSION['user']['role'] == 1) {
                                echo '<p>Edit</p>';
                                echo '<form method="post" action="edititem.php">';
                                echo '<table>';
                                echo '<tr>';
                                echo '<input value=' . $item["id"] . ' name="item" type="hidden"> <br/>';
                                echo '<label>Availability:</label>
                                    <select name="availability" >';
                                    if($item['available']){
                                        echo '
                                        <option value="1" selected="selected">Available</option>
                                        <option value="0">Not Available</option>';
                                    }

                                    else {
                                        echo
                                        '<option value="1">Available</option>
                                        <option value="0" selected="selected">Not Available </option>';
                                    }
                                    
                                    echo '</select> <br>';
                                echo '<label>Name:</label><input value="' . $item["dish_name"] . '" name="itemName" type="text"> <br/>';
                                echo '<label>Description:</label><input value="' . $item["dish_description"] . '" name="description" type="textarea"> <br/>';
                                echo '<label>Price ($):</label><input value="' . $item["price"] . '" name="itemPrice" type="text"> <br/>';
                                
                                echo '</tr>';
                                echo '</table>';
                                echo '<input value="Confirm Change"  type="submit" id="center">';   
                                echo '<br><br></form>';

                            }
                        }

                        
                        echo '</ul>';
                        echo '</div>';
                        
                        
                    }


                    echo '</div>';
                
            }
            ?>
        
        
        

        </div>
        <?php 
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['role'] == 0) {
                echo '<a href="cart.php">
                        <button>View Cart</button>
                    </a>';
            }
            else if ($_SESSION['user']['role'] == 1) {
                echo '<a href="addProduct.php">
                    <button>Add Product to Menu</button>
                 </a>';
            
            }
        }
        
        ?>
        
        </div> <!-- box1 contents -->

        </div> <!-- box 1 -->
    </div> <!-- wrapper -->

<?php include(SHARED_PATH . "/public_footer.php"); ?>





