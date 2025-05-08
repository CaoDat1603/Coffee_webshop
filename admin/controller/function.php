<?php
    function getAllFeatureOfProduct($this_id){
        global $conn;
        $sql = "SELECT * FROM product WHERE product_id = '$this_id'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }


    function getAllActiveProducts() {
        global $conn;
        $sql = "SELECT * FROM product WHERE status = 'active'";
        $query = mysqli_query($conn, $sql);
        $products = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $products[] = $row;
        }
        return $products;
    }


    function hideProduct($product_id) {
        global $conn;
        $sql = "UPDATE product SET status = 'hidden' WHERE product_id = '$product_id'";
        return mysqli_query($conn, $sql);
    }

    function showProduct($product_id) {
        global $conn;
        $sql = "UPDATE product SET status = 'active' WHERE product_id = '$product_id'";
        return mysqli_query($conn, $sql);
    }

    function getUserInfor($user_id,$infor){
        global $conn;
        $valid_columns = ['user_name', 'phone_number', 'level'];
        if (!in_array($infor, $valid_columns)) {
            return null; 
        }
        $sql = "SELECT $infor FROM user WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row[$infor];
        }
        return null;
    }

    function getOrderInfor($order_id, $infor) {
        global $conn;
        $valid_columns = ['total_payment', 'order_time', 'Status', 'user_id', 'order_address'];
        if (!in_array($infor, $valid_columns)) {
            return null; 
        }
        $sql = "SELECT $infor FROM `order` WHERE order_id = '$order_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row[$infor];
        }
        return null;
    }

    function getProductInfor($product_id, $infor) {
        global $conn;
        $valid_columns = ['ca_id', 'product_name', 'price', 'status'];
        if (!in_array($infor, $valid_columns)) {
            return null; 
        }
        $sql = "SELECT $infor FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row[$infor];
        }
        return null;
    }


    function getProductName($product_id){
        global $conn;
        $sql = "SELECT product_name FROM product WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['product_name'];
        }
        return null;
    }

    function getProductQuantity($order_id, $product_id) {
        global $conn;
        $sql = "SELECT quantity FROM orderdetail WHERE order_id = '$order_id' AND product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['quantity'];
        }
        return null; 
    }

    function getOrderDetail($order_id){
        global $conn;
        $sql = "SELECT product_id FROM orderdetail WHERE order_id = '$order_id'";
        $query = mysqli_query($conn, $sql);
        $order_detail = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $product_name = getProductName($row['product_id']);
            $quantity = getProductQuantity($order_id, $row['product_id']);
            $price = getProductInfor($row['product_id'], 'price');
            $order_detail[] = ['product_name' => $product_name, 'quantity' => $quantity, 'price' => $price];
        }
        return $order_detail; 
    }

    function getPendingOrderId() {
        global $conn;
        $sql = "SELECT order_id FROM `order` WHERE Status = 'Pending'";
        $query = mysqli_query($conn, $sql);
        
        $pending_order_id = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $pending_order_id[] = $row['order_id'];
        }
        
        return $pending_order_id;
    }

    function getShippingOrderId() {
        global $conn;
        $sql = "SELECT order_id FROM `order` WHERE Status = 'Shipping'";
        $query = mysqli_query($conn, $sql);
        
        $shipping_order_id = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $shipping_order_id[] = $row['order_id'];
        }
        
        return $shipping_order_id;
    }

    function getDeliveredOrderId() {
        global $conn;
        $sql = "SELECT order_id FROM `order` WHERE Status = 'Delivered'";
        $query = mysqli_query($conn, $sql);
        
        $delivered_order_id = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $delivered_order_id[] = $row['order_id'];
        }
        
        return $delivered_order_id;
    }

    function getCancelledOrderId() {
        global $conn;
        $sql = "SELECT order_id FROM `order` WHERE Status = 'Cancelled'";
        $query = mysqli_query($conn, $sql);
        
        $cancelled_order_id = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $cancelled_order_id[] = $row['order_id'];
        }
        
        return $cancelled_order_id;
    }

    function getProductType($ca_id){
        global $conn;
        $sql = "SELECT * FROM product WHERE ca_id = $ca_id";
        $query = mysqli_query($conn, $sql);
        
        $product_type = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $product_type[] = $row;
        }
        return $product_type;
    }

    function getProducts(){
        global $conn;
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        
        $products = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $products[] = $row;
        }
        return $products;
    }

    function getOrderStatus($status){
        global $conn;
        $sql = "SELECT * FROM `order` WHERE Status = '$status'";
        $query = mysqli_query($conn, $sql);
        
        $order_status = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $order_status[] = $row;
        }
        return $order_status;
    }

    function getOrder() {
        global $conn;
        $sql = "SELECT * FROM `order`";
        $result = mysqli_query($conn, $sql);
    
        $orders = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $orders[] = $row;
            }
        }
    
        return $orders;
    }

    function getUserLevel($level){
        global $conn;
        $sql = "SELECT * FROM `user` WHERE level = $level";
        $query = mysqli_query($conn, $sql);
        
        $user_level = [];
        
        while ($row = mysqli_fetch_assoc($query)) {
            $user_level[] = $row;
        }
        return $user_level;
    }

    function getUser() {
        global $conn;
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql);
    
        $users = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $users[] = $row;
            }
        }
    
        return $users;
    }
?>