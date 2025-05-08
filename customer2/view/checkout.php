<?php include "../model/checkout.php";?>
<link rel="stylesheet" type="text/css" href="../view/css/checkout.css">
    <!--main section-->
    <main class="main">
        <div class="page-heading">
            <div class="container">
                <ul class="breadcrumb">
                    <li>Giỏ hàng</li> /
                    <li id="page-active">Đơn hàng</li>
                </ul>
                <div id="date-send" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;"></div>
                <hr>
            </div>
        </div>
        <form class="detail-container" id="checkoutForm" method="POST" >
            <h1 id="detail-title">Chi tiết Đơn hàng</h1>
            <div style="display: flex; width: 100%; align-items: center; justify-content: center; padding-bottom: 5px;">
                <div class="line-tt-pg"></div>
                <img class="img-tt-pg" src="../view/img/logo.png">
                <div class="line-tt-pg"></div>
            </div>
            <div id="contents">
                <b style="margin-left: 5px;">Sản phẩm đặt mua:</b>
                <div class="detail-products"></div>
            </div>
            <div class="inf-cus-order">
                <b>Thông tin người nhận hàng:*</b>
                <div class="detail-inf-cus-order">
                    <input class="input-name" type="text" placeholder="Tên người nhận" autocomplete="tel" name="name" aria-invalid="false" value="<?php echo $result['user_name']; ?>">
                    <input class="input-phone" type="text" placeholder="Số điện thoại" autocomplete="tel" name="phone" aria-invalid="false" value="<?php echo $result['phone_number']; ?>">
                </div>
            </div>
            <div class="delivery-method">
                <fieldset style="padding: 10px 20px; margin-bottom: 20px; display: flex; flex-direction: column; gap: 10px;">
                    <legend style="margin: 0 20px;">
                        <b>Phương thức giao hàng:*</b>
                    </legend>
                    <div>
                        <input type="radio" id="standard" name="delivery" value="standard" checked>
                        <label for="standard" style="color:#a5a2a2;">Giao hàng tận nơi</label>
                    </div>
                </fieldset>
            </div>
            <div class="inf-cus-order">
                <b>Địa chỉ nhận hàng:*</b>
                <div class="detail-inf-cus-order">
                    <input class="input-id" id="oderaddress" placeholder="Nhập địa chỉ nhận hàng" autocomplete="tel" aria-invalid="false" name="order_address">
                    <span class="error-message" id="oderaddress-error"></span>
                </div>
            </div>
            <div class="sale-method" style="gap: 10px; display: flex; flex-direction: column;">
                <b>Mã khuyến mãi:</b>
                <div>
                    <input type="text" id="promo-code" name="promo-code" placeholder="Nhập mã khuyến mãi">
                    <button type="button" id="apply-promo">Áp dụng</button>
                </div>
                <div id="noice-sale-method"></div>
            </div>
            <div id="money-total">
                <b>Tổng tiền: </b>
                <p id="total-mn"></p>
            </div>
            <div class="payment-method">
                <fieldset style="padding: 10px 20px; margin-bottom: 20px; display: flex; flex-direction: column; gap: 10px;">
                    <legend style="margin: 0 20px;">
                        <b>Phương thức thanh toán:*</b>
                    </legend>
                    <div>
                        <input type="radio" id="standard-pm" name="payment" value="standard-pm" checked>
                        <label for="standard-pm">Thanh toán trực tiếp</label>
                    </div>
                    <div>
                        <input type="radio" id="express-pm" name="payment" value="express-pm">
                        <label for="express-pm">Thanh toán trực tuyến</label>
                    </div>
                </fieldset>
            </div>

            <!-- Phương thức thanh toán trực tuyến -->
            <div id="online-payment-methods" style="display: none; text-align: center;">
        
                <button class="momo-btn"  id="payWithMomoQR" onclick="showAddProductForm()">Thanh toán MOMO QRcode</button>
                <button class="momo-btn" id="payWithMomoATM" onclick="showAddProductForm()">Thanh toán MOMO ATM</button>
            </div>

            <!-- hidden form -->
            <input type="hidden" id="cart_data" name="cart_data">
            <input type="hidden" id="total_amount" name="total_amount">
            <input type="hidden" id="order_date" name="order_date">
            <input type="hidden" id="orderId" name="orderId">
            
            <button id="confirm-btn-yes" class="yes-button" onclick="showAddProductFormPre()">Đặt hàng</button>

            <div id="backround-form-buttons" class="confirmation-box">
                <div class="form-yes" style="height: 200px; width: 400px;">
                    <h2 style="height: 120px;">Bạn có chắc chắn không.</h2>
                    <div class="form-buttons">
                        <button id="ok-button" name="btn" type="submit">Xác nhận</button>
                        <button id="cancel-btn" type="button" name="cancel" onclick="hideAddProductForm()">Hủy</button>
                    </div>
                </div>
            </div>
        </form>

    </main>
    <script type="text/javascript" src="../view/js/product.js"></script>
    <script>
        document.getElementById('ok-button').addEventListener('click', function(e) {
        // Lấy dữ liệu giỏ hàng từ localStorage
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Kiểm tra nếu giỏ hàng trống
        if (cart.length === 0) {
            if (document.getElementById('backround-form-buttons').classList.contains('pre')) {
                alert("Thanh toán thành công.");
            } else {
                alert("Giỏ hàng trống, vui lòng thêm sản phẩm vào giỏ hàng.");
            }
            e.preventDefault(); // Ngăn chặn submit form
            return;
        }
        // Đổ dữ liệu từ localStorage vào các trường ẩn
        document.getElementById('cart_data').value = JSON.stringify(cart);
        const totalAmount = cart.reduce((total, item) => total + parseCurrency(item.price) * item.quantity, 0);
        document.getElementById('total_amount').value = formatCurrency(totalAmount);
    
        // Ngày đặt hàng
        const dateSendElement = document.getElementById('order_date');
        if (dateSendElement) {
            const currentDate = new Date();
            const formattedDate = formatDate(currentDate);
            dateSendElement.value = `${formattedDate}`;
        }

        if (document.getElementById('backround-form-buttons').classList.contains('pre')) {
            localStorage.removeItem('cart');
        }
        
        });    
        function parseCurrency(value) {
            return parseFloat(value.replace(/\./g, '').replace('đ', ''));
        }
    
        function formatCurrency(value) {
            return value.toLocaleString({ style: 'currency'});
        }

        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        }

        function showAddProductForm() {
            let isValid = true;

            const address = document.getElementById('oderaddress').value;

            if (!address) {
                document.getElementById('oderaddress-error').innerText = "Vui lòng nhập địa chỉ giao hàng.";
                document.getElementById('oderaddress-error').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('oderaddress-error').style.display = 'none';
            }
            // Nếu hợp lệ, hiển thị form xác nhận
            if (isValid) {
                document.getElementById('backround-form-buttons').style.display = 'flex';
            }
        }
        

        function hideAddProductForm() {
            document.getElementById('backround-form-buttons').style.display = 'none';
            if (document.getElementById('backround-form-buttons').classList.contains('pre')) {
                document.getElementById('backround-form-buttons').classList.remove('pre');
            }
        }

        function showAddProductFormPre() {
            let isValid = true;

            const address = document.getElementById('oderaddress').value;

            if (!address) {
                document.getElementById('oderaddress-error').innerText = "Vui lòng nhập địa chỉ giao hàng.";
                document.getElementById('oderaddress-error').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('oderaddress-error').style.display = 'none';
            }
            // Nếu hợp lệ, hiển thị form xác nhận
            if (isValid) {
                document.getElementById('backround-form-buttons').style.display = 'flex';
                document.getElementById('backround-form-buttons').classList.add('pre');
            }
        }

        document.getElementById("confirm-btn-yes").addEventListener("click", function(event) {
            event.preventDefault();
        })

        //Thanh toán trực tiếp 
        document.addEventListener("DOMContentLoaded", function () {
            const confirmBtnYes = document.getElementById("confirm-btn-yes");
            const onlinePaymentMethods = document.getElementById("online-payment-methods");

            document.getElementById("express-pm").addEventListener("change", function () {
                onlinePaymentMethods.style.display = "block"; // Hiện phương thức thanh toán trực tuyến
                confirmBtnYes.style.display = "none"; // Ẩn nút xác nhận
            });

            document.getElementById("standard-pm").addEventListener("change", function () {
                onlinePaymentMethods.style.display = "none"; // Ẩn phương thức thanh toán trực tuyến
                confirmBtnYes.style.display = "flex"; // Hiện lại nút xác nhận
            });
        });

        document.getElementById("payWithMomoQR").addEventListener("click", function() {

            // Đổi action của form thành momopayment
            document.getElementById("checkoutForm").action = "../view/momopayment.php";
            //document.getElementById("checkoutForm").target="_blank";
            document.getElementById("checkoutForm").enctype="application/x-www-form-urlencoded";
            event.preventDefault();
        });
        document.getElementById("payWithMomoATM").addEventListener("click", function() {

            // Đổi action của form thành momopayment_atm
            document.getElementById("checkoutForm").action = "../view/momopayment_atm.php";
            //document.getElementById("checkoutForm").target="_blank";
            document.getElementById("checkoutForm").enctype="application/x-www-form-urlencoded";
            event.preventDefault();
        });   
        
        
        document.addEventListener("DOMContentLoaded", function () {
            // Lấy URL hiện tại và parse các tham số
            let urlParams = new URLSearchParams(window.location.search);
            
            //Lấy address
            let orderAddress = urlParams.get("orderInfo");
            // Lấy giá trị orderId nếu có
            let orderId = urlParams.get("orderId");


            if (orderAddress) {
                document.getElementById('oderaddress').value = orderAddress;
            }
            // Kiểm tra nếu orderId tồn tại
            if (orderId) {
                document.getElementById('orderId').value = orderId;
                document.getElementById('backround-form-buttons').classList.add('pre');
                document.getElementById("ok-button").click();  
            }
        });
    </script>