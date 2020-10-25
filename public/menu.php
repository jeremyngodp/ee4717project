<?php 
    require_once("../private/initialize.php"); 
    session_start();

    // unset($_SESSION['user']);
    // unset($_SESSION ['item-id']);
    // unset($_SESSION['cart']);

    if(isset($_SESSION['user'])){
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        
    
        if(!isset($_SESSION['item-name'])) {
            $_SESSION['item-name'] = array();
        }
    
        if(!isset($_SESSION['item-price'])) {
            $_SESSION['item-price'] = array();
        }
    
        // echo "cart length " . count($_SESSION['cart']) . "<br/>";
        
    
        if (isset($_GET['item']) && isset($_GET["quantity"])) {
            
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
<link rel="stylesheet" href="style2.css">
    <div class="wrapper">
        <div class="box1"> <!-- for whole segment of menu -->
            <div class="box1content"> <!-- contents within whole segment of menu -->



        <h1>Look Through our Menu</h1>
        <?php if (!isset($_SESSION['user'])) {
            echo '<a href="login.php">Login and Start Ordering now</a>';
        }
        ?>
        <div>
            <?php while($category = $category_list->fetch_assoc()) {
                echo '<div class="category">'; 
                // category colour to separate contents
                


                echo '<h2>'. $category["cat_name"] .'</h2>'; 
                $item_list = findDishByCategory($category["id"]);
                while ($item = $item_list->fetch_assoc()){
                    echo '<div class ="categorycontent">';
                    echo '<h4>' . $item["dish_name"] . '</h4>';
                    echo '<img src="media/logo.png" alt="Yum Yum Bakery!" class="categoryimage">';
                    echo '<ul>';
                    echo '<li>' . $item["description"] . '</li>';
                    echo "<li>" . $item["price"] . "</li>";
                    
                    
                    
                    if (isset($_SESSION['user'])){
                        echo '<form method="get" action=' . $_SERVER["PHP_SELF"].'>';
                        echo 'Quantity: <input value="0" name="quantity" type="text"> <br/>';
                        echo '<input value=' . $item["id"] . ' name="item" type="hidden"> <br/>';
                        echo '<input value="' . $item["dish_name"] . '" name="itemName" type="hidden"> <br/>';
                        echo '<input value="' . $item["price"] . '" name="itemPrice" type="hidden"> <br/>';
                        echo '<input value="Add to Cart"  type="submit">';
                        echo '</form>';
                    }

                    
                    echo '</ul>';
                    echo '</div>';
        
                }
                echo '</div>';
            }
            ?>
        
        
        

        <div>
        <?php if(isset($_SESSION['user'])){
            echo '<a href="cart.php">
                    <button>View Cart</button>
                 </a>';
            }
        
        ?>
        </div>
        </div> <!-- box1 contents -->

        </div> <!-- box 1 -->
    </div> <!-- wrapper -->

<?php include(SHARED_PATH . "/public_footer.php"); ?>





