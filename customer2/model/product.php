<?php 
    include "connect.php"; 
    
    $category_map = [
        1 => 'Caffee',
        2 => 'Trà',
        3 => 'Bánh'
    ];

    $sql = "SELECT * FROM product WHERE 1=1 AND status = 'active'";

    if(isset($_POST['search_button']) && $_POST['search'] != ''){
        $content = $_POST['search'];
        $sql .= " AND product_name LIKE '%$content%'";
    }

    $sql .= " ORDER BY product_id";

    $products = mysqli_query($conn, $sql);
    mysqli_close($conn);
?>



