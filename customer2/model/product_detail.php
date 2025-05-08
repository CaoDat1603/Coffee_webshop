<?php 
    include "connect.php";
    include "../controller/function.php";

    $this_id = $_GET['this_id'];
    $this_id = (int)$this_id;

    $category_map = [
        1 => 'Caffee',
        2 => 'Trà',
        3 => 'Bánh'
    ];


    $sql = "SELECT * FROM product WHERE product_id = $this_id";
    $product = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    mysqli_close($conn);
?>