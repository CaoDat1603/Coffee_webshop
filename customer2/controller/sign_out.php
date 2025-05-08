<?php
session_start();


if (isset($_POST['logout'])) {
    
    unset($_SESSION['mySession']);
    
    // xóa toàn bộ session, sử dụng session_destroy():
    // session_destroy();

    
    header('Location: ../controller/index.php'); 
    exit();
}
?>