<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin']) || !isset($_SESSION['mySession_level'])){
        header('location: ../view/sign_in.php');
    }
?>
    
    <?php include "../model/manage_oders.php";?>
    <link rel="stylesheet" href="../view/css/orders.css">
    <main>
    <div class="container-overview-all">
        <fieldset>
            <legend><h1>Tổng quan Đơn hàng</h1></legend>

            <div class="overview-all">
                <div class="overview-item" data-status="all">
                    <h2><?php echo $qantity_of_orders ?></h2>
                    <p>Tổng Đơn hàng</p>
                </div>
                <div class="overview-item" data-status="Pending">
                    <h2><?php echo $qantity_of_pending_order ?></h2>
                    <p>Đơn hàng Chờ xử lý</p>
                </div>
                <div class="overview-item" data-status="Shipping">
                    <h2><?php echo $qantity_of_shipping_order ?></h2>
                    <p>Đơn hàng Đang giao</p>
                </div>
                <div class="overview-item" data-status="Delivered">
                    <h2><?php echo $qantity_of_delivered_order ?></h2>
                    <p>Đơn hàng Đã giao</p>
                </div>
                <div class="overview-item" data-status="Cancelled">
                    <h2><?php echo $qantity_of_cancelled_order ?></h2>
                    <p>Đơn hàng Bị hủy</p>
                </div>
            </div>
        </fieldset>
    </div>



    <form class="search-container" method="POST" action="">
        <input type="search" name="search_order_id" class="search-input" placeholder="Tìm theo Order ID..." aria-label="Search by Order ID"> 
        <button type="submit" name="search_id_btn" class="search-button" aria-label="Search Button"><i class='bx bx-search'></i></button> 
        <input type="search" name="search_phone" class="search-input" placeholder="Tìm theo SĐT khách hàng..." aria-label="Search by Phone Number">
        <button type="submit" name="search_phone_btn" class="search-button" aria-label="Search Button"><i class='bx bx-search'></i></button>
    </form>

        <h2>Order List</h2>
        
        <?php include "../model/display_orders.php"; ?>

    </main>
    <script src="../view/js/orders.js"></script>
</body>
</html>
