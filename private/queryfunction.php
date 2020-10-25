<?php
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
    

    function findAllCategory() {
        global $db;

        $sql = "SELECT * FROM f34ee.category ;";
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function findAllOrderByUser($id) {
        global $db;

        $sql= "SELECT * FROM f34ee.order WHERE user_id = " . $id . ";" ;
        // $result = $sql;
        $result = $db->query($sql);
        confirm_result_set($result);
        return $result;
    }

    function addToOrder($customer_id) {
        global $db;

        $sql ="INSERT INTO f34ee.order (customer_id) VALUE (" . $customer_id . ");";
        if($db->query($sql) === false){
            echo "fail to add order";
        }

        return $db->insert_id;
    }

    function addToOrderItem($order_id, $cart) {
        global $db;

        foreach($cart as $key=> $value){
            $sql = "INSERT INTO f34ee.orderitem (order_id, item_id, quantity ) VALUE (" . $order_id ."," . $key ."," . $value." );";
            $db->query($sql);
        }

    }

    // function findAlItemByOrder($id) {
    //     global $db;

    //     $sql = "SELECT item.id  FROM "
    // }
?>