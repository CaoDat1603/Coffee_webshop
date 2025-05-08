<?php 
    include "connect.php"; 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['mySession'])){
        $user_id = $_SESSION['mySession'];
    }

    $p_sql = "SELECT o.* FROM `order` o 
            JOIN `user` u ON o.user_id = u.user_id 
            WHERE 1=1 AND Status = 'Pending' AND o.user_id = $user_id 
            ORDER BY o.order_time DESC";

    $pending_orders = mysqli_query($conn, $p_sql);

    $s_sql = "SELECT o.* FROM `order` o 
            JOIN `user` u ON o.user_id = u.user_id 
            WHERE 1=1 AND Status = 'Shipping' AND o.user_id = $user_id
            ORDER BY o.order_time DESC";

    $shipping_orders = mysqli_query($conn, $s_sql);

    $d_sql = "SELECT o.* FROM `order` o 
            JOIN `user` u ON o.user_id = u.user_id 
            WHERE 1=1 AND Status = 'Delivered' AND o.user_id = $user_id
            ORDER BY o.order_time DESC";

    $delivered_orders = mysqli_query($conn, $d_sql);

    $c_sql = "SELECT o.* FROM `order` o 
            JOIN `user` u ON o.user_id = u.user_id 
            WHERE 1=1 AND Status = 'Cancelled' AND o.user_id = $user_id
            ORDER BY o.order_time DESC";

    $cancelled_orders = mysqli_query($conn, $c_sql);


?>