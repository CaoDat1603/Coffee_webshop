

<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caffe Monster</title>
    <link rel="icon" type="image" href="../view/img/logo-tap.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!--header section-->
    <header class="header">
        <a href="#"><img src="../view/img/logo.png" class="logo" alt="Caffe Monster Logo"></a>
        <div class="mobile"><a href="#" id="bar" aria-label="Open Navigation Menu"><i class='bx bx-menu'></i></a></div>
        <nav id="navbar" role="navigation">
            <ul>
                <li><a class="nav-index active" href="index.php">Trang chủ</a></li>
                <li>
                    <a class="nav-prd" href="index.php?act=product">Sản phẩm</a>
                </li>
                <li><a class="nav-sale" href="index.php?act=sale">Khuyến mãi</a></li>
                <a href="#" id="close" aria-label="Close Navigation Menu"><i class='bx bx-x'></i></a>
            </ul>
        </nav>      
        <?php
        // Kiểm tra nếu có dữ liệu tìm kiếm từ form
        $searchValue = isset($_POST['search']) ? $_POST['search'] : ''; // Lưu trữ giá trị tìm kiếm
        ?>  
        <form class="search-container" method="POST" action="../controller/index.php?act=product">
            <input name="search" type="search" class="search-input" placeholder="Tìm kiếm sản phẩm của cửa hàng..." aria-label="Search" value="<?php echo htmlspecialchars($searchValue); ?>">
            <button name="search_button" class="search-button" type="submit" aria-label="Search Button">
                <i class='bx bx-search'></i>
            </button>
        </form>
        <div class="cart">
            <a href="#" id="cartIcon"><i id="bx" class='bx bx-cart'></i><sub>0</sub></a>
            <div class="cart-items" id="cart-items-sup">
                <div class="cart-item"></div>
                <div class="cart-summary">
                    <div class="cart-total">Tổng tiền: 0 VNĐ</div>
                    <a href="index.php?act=checkout" class="checkout-button" id="checkoutBtn" style="pointer-events: none; opacity: 0.5;">Thanh toán</a>
                </div>                
            </div>
        </div>
        <div id="icon-group">
            <ul>
                <li>
                    <a class="noice" id="noice" href="#" id="bx"><i class='bx bxs-envelope'></i><sub>0</sub></a>
                    <div class="envelope-items" id="envelope-items">
                        <div class="envelope-item" style="overflow-y: auto; height: 200px;"></div>
                        <div class="envelope-summary">
                            <a href="#" class="checkread-button" id="markAllRead bx">Đọc tất cả</a>
                        </div>                
                    </div>
                </li>
                <li>
                    <a class="user" id="user" href="#"><i class='bx bx-user'></i></a>
                    <?php if (!$isLoggedIn): ?>
                        <ul class="sub2-menu" id="sub2-menu">
                            <li><a href="index.php?act=sign_up">Đăng ký</a></li>
                            <li><a href="index.php?act=sign_in">Đăng nhập</a></li>
                        </ul>
                    <?php else: ?>
                        <ul class="sub3-menu" id="sub3-menu">
                            <div class="user-names">
                                <?php include "../model/customer_infor.php" ?>
                                <b>Tên Tài khoản:</b>
                                <p id="user-name"><?php echo $user_infor['user_name']; ?></p>
                                <b id="phone-number" style="font-size: 0.85rem;">Số điện thoại:</b>
                                <span style="font-size: 0.75rem;"><?php echo $user_infor['phone_number']; ?></span>
                            </div>
                            <hr>
                            <li><button id="editaccount" onclick="location.href='index.php?act=edit_account'">Chỉnh sửa</button></li>
                            <li><a href="index.php?act=purchase_history">Lịch sử mua hàng</a></li>
                            <li style="display: flex; justify-content: center;">
                                <form method="post" action="../controller/sign_out.php">
                                    <button type="submit" id="logout" style="text-align: center;" name="logout">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
    </header>
</body>
</html>

