<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin']) || !isset($_SESSION['mySession_level'])){
        header('location: ../view/sign_in.php');
    }
?>

<?php include "../model/manage_account.php"; ?>
<?php include "../model/add_account.php"; ?>
<link rel="stylesheet" href="../view/css/accounts.css">
    <main>
        <div class="container-overview-all">
            <fieldset>
                <legend><h1>Tổng quan Tài Khoản</h1></legend>
    
                <div class="overview-all">
                    <div class="overview-item" data-category="">
                        <h2 id="totalAccounts"><?php echo $qantity_of_user ?></h2>
                        <p>Tổng số Tài Khoản</p>
                    </div>
                    <div class="overview-item" data-category="0">
                        <h2 id="adminAccounts"><?php echo $qantity_of_user_admin_level ?></h2>
                        <p>Tài Khoản (Admin)</p>
                    </div>
                    <div class="overview-item" data-category="1">
                        <h2 id="customerAccounts"><?php echo $qantity_of_user_customer_level ?></h2>
                        <p>Tài Khoản (Khách hàng)</p>
                    </div>
                </div>
            </fieldset>
        </div>
    
        <form class="search-container" method="POST" action="">
            <input type="search" name="content" class="search-input" placeholder="Tìm kiếm theo SĐT..." aria-label="Search" value="<?php echo isset($_POST['content']) ? htmlspecialchars($_POST['content']) : ''; ?>">
            <button type="submit" name="search" class="search-button" aria-label="Search Button">
                <i class='bx bx-search'></i>
            </button>
        </form>
    
        <button class="add-account-button" onclick="showAddAccountForm()">Thêm Tài Khoản</button>

        <div id="addAccountFr" style="display: none;">
            <form id="addAccountForm" method="POST">
                <h3>Thêm Tài Khoản Mới</h3>
                <label for="accountName">Tên Tài Khoản:</label>
                <input id="account-name" class="input-name" type="text" placeholder="Tên tài khoản" autocomplete="tel" name="user_name" aria-invalid="false">
                <span class="error-message" id="name-error"></span>
                <label for="accountPhone">Số điện thoại:</label>
                <input id="account-phone" class="input-phone" type="text" placeholder="Số điện thoại" autocomplete="tel" name="phone_number" aria-invalid="false">
                <span class="error-message" id="phone-error"></span>
                <label for="accountPassword">Mật khẩu:</label>
                <input id="account-password" class="input-password" type="password" placeholder="Mật khẩu" autocomplete="tel" name="user_pass" aria-invalid="false">
                <span class="error-message" id="password-error"></span>
                <label for="accountRole">Vai trò:</label>
                <select id="accountRole" name="level">
                    <option value="">Chọn loại tài khoản</option>
                    <option value="0">Admin</option>
                    <option value="1">Khách hàng</option>
                </select>
                <span class="error-message" id="accountRole-error"></span>
                <div class="form-buttons">
                    <button id="br" onclick="showAccountYes()">Thêm Tài Khoản</button> 
                    <button id="eixnowbt" type="button" name="cancel" onclick="hideAddAccountForm()">Hủy</button>
                </div>
                <div id="backround-form-buttons" style="display: none;">
                    <div class="form-yes" style="width: 30%; height: 30%;">
                        <h2 style="justify-content: center; display: flex; height: 55%;">Xác nhận thêm tài khoản?</h2>
                        <div class="form-buttons">
                            <button id="submit br" type="submit" name="add">Xác nhận</button>
                            <button id ="br" type="button" onclick="hideAccountYes()">Hủy</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    
        <h2>Danh sách tài khoản</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Số điện thoại</th>
                    <th>Vai trò</th>
                </tr>
            </thead>
            <tbody id="accounts-list">
            <?php include "../model/display_account.php"; ?>
            </tbody>
        </table>
    </main>
    
    <script src="../view/js/accounts.js"></script>
</body>
</html>
