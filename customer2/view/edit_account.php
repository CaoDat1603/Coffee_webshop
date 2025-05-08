<?php include "../model/customer_infor.php"; ?>
<?php include "../model/edit_account.php"; ?>


<link rel="stylesheet" type="text/css" href="../view/css/styleEditAccount.css">
    <!--main section-->
    <main class="main">
        <div class="page-heading">
            <div class="container">
                <div id="date-send" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;">Ngày chỉnh sửa: </div>
                <hr>
            </div>
        </div>
        <div class="notification-container">
        <a href="#" id="back-button" class="back-button">Trở về</a>
            <hr style="margin-top: 10px; margin-bottom: 10px;">
            <h1 id="notification-title">Chỉnh sửa tài khoản</h1>
            <div style="display: flex; width: 100%; align-items: center; justify-content: center; padding-bottom: 5px;">
                <div class="line-tt-pg"></div>
                <img class="img-tt-pg" src="../view/img/logo.png">
                <div class="line-tt-pg"></div>
            </div>

            <form class="contents" method = "POST">
                <p>Tên tài khoản</p>
                <input type="text" id="account-name" name="user_name" value="<?php echo $user_infor['user_name']; ?>" class="input-field">
                <span class="error-message" id="name-error"></span>
                <p>Số điện thoại</p>
                <input type="text" id="account-phone" name="phone_number" value="<?php echo $user_infor['phone_number']; ?>" class="input-field">
                <span class="error-message" id="phone-error"></span>
                <hr style="margin-top: 10px;">
                <div class="button-container">
                    <button id="edit-btn" onclick="showAddProductForm()">Edit</button>
                    <button id="change-password-btn" type="button" onclick="location.href='index.php?act=change_password'">Change Password</button>
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
            const accountName = document.getElementById('account-name').value;
            const accountPhone = document.getElementById('account-phone').value;

            if (!accountName) {
                document.getElementById('name-error').innerText = "Vui lòng nhập tên tài khoản.";
                document.getElementById('name-error').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('name-error').style.display = 'none';
            }

            if (!accountPhone) {
                document.getElementById('phone-error').innerText = "Vui lòng nhập số điện thoại hợp lệ.";
                document.getElementById('phone-error').style.display = 'block';
                isValid = false;
            } else if (!validatePhoneNumber(accountPhone)) {
                document.getElementById('phone-error').innerText = "Số điện thoại phải có đúng 10 chữ số.";
                document.getElementById('phone-error').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('phone-error').style.display = 'none';
            }

            if (isValid) {
                document.getElementById('backround-form-buttons').style.display = 'flex';
            }
        }

        function validatePhoneNumber(phoneNumber) {
            const regex = /^\d{10}$/;
            return regex.test(phoneNumber);
        }

        document.getElementById('account-name').addEventListener('input', function() {
            document.getElementById('name-error').style.display = 'none';
        });
        document.getElementById('account-phone').addEventListener('input', function() {
            document.getElementById('phone-error').style.display = 'none';
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

        document.addEventListener('DOMContentLoaded', () => {
            const backButton = document.getElementById('back-button');
            const returnPage = sessionStorage.getItem('returnPage') || 'index.php';

            backButton.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = returnPage;
            });
        });

    </script>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>
