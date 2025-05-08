<?php include "../model/change_password.php" ?>

<link rel="stylesheet" type="text/css" href="../view/css/styleChangePassword.css">
    <!--main section-->
    <main class="main">
        <div class="page-heading">
            <div class="container">
                <div id="date-send" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;">Ngày chỉnh sửa: </div>
                <hr>
            </div>
        </div>
        <div class="notification-container">
        <botton id="back-button" class="back-button" onclick="location.href='../controller/index.php?act=edit_account'">Trở về</botton>
            <hr style="margin-top: 10px; margin-bottom: 10px;">
            <h1 id="notification-title">Thay đổi mật khẩu</h1>
            <div style="display: flex; width: 100%; align-items: center; justify-content: center; padding-bottom: 5px;">
                <div class="line-tt-pg"></div>
                <img class="img-tt-pg" src="../view/img/logo.png">
                <div class="line-tt-pg"></div>
            </div>

            <form class="contents" method = "POST">
                <p>Nhập mật khẩu cũ</p>
                <input id="pswrd_old" class="input-field" type="password" placeholder="Mật khẩu" autocomplete="tel" name="user_pass_old" aria-invalid="false">
                <span class="error-message" id="pswrd_old-error"></span>
                <hr style="margin: 20px;">
                <p>Nhập mật khẩu mới</p>
                <input id="pswd_new1" class="input-field" type="password" placeholder="Mật khẩu" autocomplete="tel" name="user_pass_new_1" aria-invalid="false">
                <span class="error-message" id="pswd_new1-error"></span>
                <p>Nhập lại mật khẩu mới</p>
                <input id="pswd_new2" class="input-field" type="password" placeholder="Mật khẩu" autocomplete="tel" name="user_pass_new_2" aria-invalid="false">
                <span class="error-message" id="pswd_new2-error"></span>
                <hr style="margin-top: 10px;">
                <div class="button-container">
                    <button id="edit-btn" onclick="showAddProductForm()">Change Password</button>
                </div>

                <div id="backround-form-buttons" class="confirmation-box">
                    <div class="form-yes">
                        <h2>Bạn có chắc chắn Xác nhận sửa đổi không.</h2>
                        <div class="form-buttons">
                            <button id="confirm-btn-yes" name="btn" type="submit">Xác nhận</button>
                            <button id="cancel-btn" type="button" name="cancel" onclick="hideAddProductForm()">Hủy</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script>
    function showAddProductForm() {
        let isValid = true;

        // Lấy các giá trị từ các trường nhập liệu
        const passwordOld = document.getElementById('pswrd_old').value;
        const passwordNew1 = document.getElementById('pswd_new1').value;
        const passwordNew2 = document.getElementById('pswd_new2').value;

        // Kiểm tra mật khẩu cũ
        if (!passwordOld) {
            document.getElementById('pswrd_old-error').innerText = "Vui lòng nhập mật khẩu cũ.";
            document.getElementById('pswrd_old-error').style.display = 'block';
            isValid = false;
        } else if (!validatePassword(passwordOld)) {
            document.getElementById('pswrd_old-error').innerText = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái viết hoa, chữ cái viết thường và số.";
            document.getElementById('pswrd_old-error').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('pswrd_old-error').style.display = 'none';
        }

        // Kiểm tra mật khẩu mới
        if (!passwordNew1) {
            document.getElementById('pswd_new1-error').innerText = "Vui lòng nhập mật khẩu mới.";
            document.getElementById('pswd_new1-error').style.display = 'block';
            isValid = false;
        } else if (!validatePassword(passwordNew1)) {
            document.getElementById('pswd_new1-error').innerText = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái viết hoa, chữ cái viết thường và số.";
            document.getElementById('pswd_new1-error').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('pswd_new1-error').style.display = 'none';
        }

        // Kiểm tra mật khẩu nhập lại
        if (!passwordNew2) {
            document.getElementById('pswd_new2-error').innerText = "Vui lòng nhập lại mật khẩu mới.";
            document.getElementById('pswd_new2-error').style.display = 'block';
            isValid = false;
        } else if (passwordNew1 !== passwordNew2) {
            document.getElementById('pswd_new2-error').innerText = "Mật khẩu nhập lại không khớp.";
            document.getElementById('pswd_new2-error').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('pswd_new2-error').style.display = 'none';
        }

        // Nếu hợp lệ, hiển thị form xác nhận
        if (isValid) {
            document.getElementById('backround-form-buttons').style.display = 'flex';
        }
    }

    function validatePassword(password) {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        return regex.test(password);
    }

    // Ẩn thông báo lỗi khi người dùng bắt đầu nhập liệu lại
    document.getElementById('pswrd_old').addEventListener('input', function() {
        document.getElementById('pswrd_old-error').style.display = 'none';
    });
    document.getElementById('pswd_new1').addEventListener('input', function() {
        document.getElementById('pswd_new1-error').style.display = 'none';
    });
    document.getElementById('pswd_new2').addEventListener('input', function() {
        document.getElementById('pswd_new2-error').style.display = 'none';
    });

        function hideAddProductForm() {
            document.getElementById('backround-form-buttons').style.display = 'none';
        }

        const dateSendElement = document.getElementById('date-send');
        if (dateSendElement) {
            const currentDate = new Date();
            const formattedDate = formatDate(currentDate);
            dateSendElement.innerText = `Ngày chỉnh sửa: ${formattedDate}`;
        }

        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }

        document.getElementById("edit-btn").addEventListener("click", function(event) {
            event.preventDefault();
        })
    </script>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>
