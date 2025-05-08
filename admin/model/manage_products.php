<?php 
    include "connect.php";
    $qantity_of_product = count(getProducts());
    $qantity_of_coffee = count(getProductType(1));
    $qantity_of_tea = count(getProductType(2));
    $qantity_of_cake = count(getProductType(3));
    $conn -> close();

?>