<?php 
    include "connect.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_SESSION['mySession_admin'])){
        $user_id = $_SESSION['mySession_admin'];
        $sql = "SELECT user_name, phone_number FROM `user` WHERE user_id = $user_id";
        $user_infor = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }
    $conn->close();
?> 