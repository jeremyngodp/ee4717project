<?php
    function addUser($email, $hashed_password, $fullname, $contact, $role) {
        global $db;

        $sql = 'INSERT INTO f34ee.user (email, h_password, fullname, contact, user_role ) VALUE ("' . $email . '","' 
                                                                                                    . $hashed_password . '","'
                                                                                                    . $fullname . '",'
                                                                                                    . $contact . ','
                                                                                                    . $role . ');' ;
        
        $db->query($sql);
        return $db->insert_id;
    }

    function findUserByEmail($email){
        global $db;
        
        $sql = 'SELECT * FROM f34ee.user WHERE email = "' . $email . '";' ;
        $result = $db->query($sql);
        if(!$result) {
            echo "User doesn't exist!";
        }

        return $result;
    }

    function findDishByCategory($cat_id) {
        global $db;

        $sql = "SELECT * FROM f34ee.menu WHERE cat_id = " . $cat_id . " and available = 1;" ;
        // echo $sql;
        $result = $db->query($sql);
        if (!$result) {
            echo "No information available for this category";
        }
        return $result;
    }

    function findDishByCategoryAdmin($cat_id) {
        global $db;

        $sql = "SELECT * FROM f34ee.menu WHERE cat_id = " . $cat_id . ";" ;
        // echo $sql;
        $result = $db->query($sql);
        if (!$result) {
            echo "No information available for this category";
        }
        return $result;
    }
    

    function findAllCategory() {
        global $db;

        $sql = "SELECT * FROM f34ee.category ;";
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function findAllOrderByUser($id) {
        global $db;

        $sql= "SELECT * FROM f34ee.order WHERE customer_id = " . $id .  ";" ;
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function addToOrder($customer_id, $amount, $date) {
        global $db;

        $sql ='INSERT INTO f34ee.order (customer_id, amount, order_date) VALUE (' . $customer_id . ', '. $amount . ', "'. $date .'");';
        if($db->query($sql) === false){
            echo "fail to add order";
        }

        return $db->insert_id;
    }

    function addToOrderItem($order_id, $cart) {
        global $db;

        foreach($cart as $key => $value){
            $sql = "INSERT INTO f34ee.orderitem (orderid, itemid, quantity ) VALUE (" . $order_id . "," . $key . "," . $value . " );";
            $result = $db->query($sql);
        }

    }

    function addProductToMenu($name, $category, $description, $price, $available) {
        global $db;

        $sql = 'INSERT INTO f34ee.menu (dish_name, price, cat_id, dish_description, available) VALUE ("'.$name .'",'
                                                                                                    .$price . ',' 
                                                                                                    .$category. ',"' 
                                                                                                    .$description .'",'  
                                                                                                    .$available .');' ;
        return $db->query($sql);
    }

    function updateItem($id, $name, $description, $price, $available) {
        global $db;

        $sql = 'UPDATE f34ee.menu SET dish_name = "'. $name. '", dish_description = "' .$description .'", available =' . $available.', price =' . $price .' WHERE id ='.$id .';' ;
        $db->query($sql);
    }
?>