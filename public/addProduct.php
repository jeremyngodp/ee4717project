
<?php require_once("../private/initialize.php");
    session_start();
    
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        redirect_to('index.php');
    }
    if($_SERVER['REQUEST_METHOD'] == POST) {
        if (!isset($_POST['name']) || !isset($_POST['category']) || !isset($_POST['price']) || !isset($_POST['description']) || !isset($_POST['available'])){
            redirect_to('addProduct.php');
        }
        else {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $available = $_POST['available'];

            $result = addProductToMenu($name, $category, $description, $price, $available);
            if(!$result){
                redirect_to ('addProduct.php');    
            }
            else {
                redirect_to ('menu.php');    
            } 
        }
    
    }

    else if ($_SERVER['REQUEST_METHOD'] == GET) {
        $category_list = findALLCategory();
    }
    
?>


<?php include( SHARED_PATH . "/public_header.php"); ?>
    <div class="wrapper">
        <div class="box1"> <!-- for whole segment of menu -->
            <div class="box1content"> <!-- contents within whole segment of menu -->
                <form action="addProduct.php" method="post" id="addproductform">
                    <label>&ast;Category: </label>
                        <select name="category">
                            <?php while($category = $category_list->fetch_assoc()) {
                                echo '<option value="' . $category['id'] .'">' . $category['cat_name'] .'</option>';
                            }?>
                        </select> <br/><br/>

                    <label>&ast;Name:</label><input value="" type="text" name="name" required ><br><br>
                    <label>&ast;Description:</label><textArea value="" type="text" name="description" required></textarea><br><br>
                    <label>&ast;Price:</label><input type="text" value="" name="price" required><br><br>
                    <label>&ast;Availability: </label>
                        <select name="available">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select> <br><br>

                    <input type="submit" name="Submit" id="Submit" value="Add Product" > <br><br>
                </form>
            </div> <!-- box1 contents -->

        </div> <!-- box 1 -->
    </div> <!-- wrapper -->

<?php include(SHARED_PATH . "/public_footer.php"); ?>