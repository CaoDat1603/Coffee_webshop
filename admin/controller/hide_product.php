<?php 
    include "../model/connect.php";
    include "function.php";

    if (isset($_GET['this_id'])) {
        hideProduct($_GET['this_id']);
        echo "<script>
        window.location.href = '../controller/index.php?act=manage-products';
        </script>";
    }
?>