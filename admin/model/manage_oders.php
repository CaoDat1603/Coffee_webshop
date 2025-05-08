<?php include "../controller/function.php";?>
<?php 
    include "connect.php";
    $qantity_of_orders = count(getOrder());
    $qantity_of_pending_order = count(getOrderStatus("Pending"));
    $qantity_of_shipping_order = count(getOrderStatus("Shipping"));
    $qantity_of_delivered_order = count(getOrderStatus("Delivered"));
    $qantity_of_cancelled_order = count(getOrderStatus("Cancelled"));
    $conn -> close();

?>