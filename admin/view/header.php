<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="icon" type="image" href="../view/img/logo-tap.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header>
        <div class="logo"><img src="../view/img/logo.png" class="logo" alt="Caffe Monster Logo"></div>
        <div class="containt-navbar">
            <h1 id="Title-admin-d">Tổng quan Quản Trị</h1>
            <h1 id="Title-admin-p" style="display: none;">Quản lý Sản Phẩm</h1>
            <h1 id="Title-admin-od" style="display: none;">Quản lý Đơn Hàng</h1>
            <h1 id="Title-admin-ac" style="display: none;">Quản lý Tài Khoản</h1>
            <h1 id="Title-admin-s" style="display: none;">Quản lý Khuyến Mãi</h1>
            <h1 id="Title-admin-n" style="display: none;">Quản lý thông báo</h1>
            <nav class="navbar">
                <ul>
                <li><a id="nav-admin-d" href="index.php" style="display: none;">Tổng quan Quản Trị</a></li>
                    <li><a id="nav-admin-p" href="index.php?act=manage-products">Quản lý Sản Phẩm</a></li>
                    <li><a id="nav-admin-od" href="index.php?act=manage-orders">Quản lý Đơn Hàng</a></li>
                    <li><a id="nav-admin-ac" href="index.php?act=manage-accounts">Quản lý Tài Khoản</a></li>
                    <li><a id="nav-admin-s" href="index.php?act=manage-sales">Quản lý Khuyến Mãi</a></li>
                    <li><a id="nav-admin-n" href="index.php?act=manage-notification">Quản lý thông báo</a></li>
                </ul>
            </nav>
        </div>
        <a href="#" class="user" id="user"><i class='bx bx-user'></i>
            <div class="sub-menu-user" id="subMenu">
                <div class="user-names">
                    <?php include "../model/admin_infor.php" ?>
                    <b>Tên Tài khoản:</b>
                    <p id="user-name"><?php echo $user_infor['user_name']; ?></p>
                    <b id="phone-number" style="font-size: 0.85rem;">Số điện thoại:</b><br>
                    <span style="font-size: 0.75rem; color: dimgrey;"><?php echo $user_infor['phone_number']; ?></span>
                </div>
                <hr>
                <button type="submit" id="editaccount" name="editaccount" onclick="location.href='index.php?act=edit_account'">Chỉnh sửa</button>
                <form method="post" action="../controller/sign_out.php">
                    <button type="submit" id="logout" name="logout">Đăng xuất</button>
                </form>
            </div>
        </a>
    </header>

