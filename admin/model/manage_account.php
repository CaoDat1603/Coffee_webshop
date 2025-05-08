<?php include "../controller/function.php";?>
<?php 
    include "connect.php";
    $qantity_of_user = count(getUser());
    $qantity_of_user_customer_level = count(getUserLevel(1));
    $qantity_of_user_admin_level = count(getUserLevel(0));
    $conn -> close();

?>