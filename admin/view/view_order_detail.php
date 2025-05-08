<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin'])){
        header('location: ../view/sign_in.php');
    }
?>

<?php 
    include "../model/view_order_detail.php";
?>
