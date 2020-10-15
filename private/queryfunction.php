<?php
    function findDishByCategory($cat_id) {
        global $db;

        $sql = "SELECT * FROM menu WHERE cat_id = " . $cat_id . " and available = 1;" ;
        // echo $sql;
        $result = $db->query($sql);
        if (!$result) {
            echo "No information available for this category";
        }
        return $result;
      }
    

    function findAllCategory() {
        global $db;

        $sql = "SELECT * FROM category ;";
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function findAllOrderByUser($id) {
        global $db;

        $sql= "SELECT * FROM order WHERE user_id = " . $id . ";" ;
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function addOrder($cart, $email) {
        $sql = "INSERT INTO order ( email, created_date) VALUE (" . $email .", curdate() );";
        $result = $db->query($sql);

        $sql_2 = "SELECT id FROM order ORDER BY id DESC LIMIT 1";
        $order_id =$db->query($sql_2);
        $sql_3 = "INSERT INTO orderitem (order_id, item_id, quantity) VALUES ";
        foreach ($cart as $key => $value) {
            $sql_3 += "(". $order_id . "," . $key . "," . $value . "), " ; //figure a way to add semicolon at end.
        }
         
    }

    // function findAlItemByOrder($id) {
    //     global $db;

    //     $sql = "SELECT item.id  FROM "
    // }
?>