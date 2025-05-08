<link rel="stylesheet" type="text/css" href="../view/css/purchase_history-detail.css">
<!--main section-->
<main class="main">
    <div class="page-heading">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.php?act=purchase_history">Lịch sử mua hàng</a></li> /
                <li id="page-active">Đơn hàng</li>
            </ul>
            <div id="date-send-history" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;"></div>
            <hr>
        </div>
    </div>
    <div class="detail-container-history">
        <h1 id="detail-title-history">Chi tiết Đơn hàng</h1>
        <div style="display: flex; width: 100%; align-items: center; justify-content: center; padding-bottom: 5px;">
            <div class="line-tt-pg"></div>
            <img class="img-tt-pg" src="../view/img/logo.png">
            <div class="line-tt-pg"></div>
        </div>
        <p><strong>ID đơn hàng:</strong> <span id="order-id"></span></p>
        <p><strong>Tên khách hàng:</strong> <span id="customer-name"></span></p>
        <p><strong>Số điện thoại:</strong> <span id="phone-name"></span></p>
        <p><strong>Sản phẩm:</strong></p>
        <div id="order-products" style="border: 1px solid #9c9c9c;"></div>
        <p><strong>Tổng tiền:</strong> <span id="order-total" style="color: red;"></span></p>
        <p><strong>Phương thức giao hàng:</strong> <span id="delivery-method"></span></p>
        <p><strong>Phương thức thanh toán:</strong> <span id="payment-method"></span></p>
        <p><strong>Mã khuyến mãi:</strong> <span id="promo-code"></span></p>
        <p><strong>Trạng thái:</strong> <span id="order-status"></span></p>
        <a href="#" id="back-button" class="back-button">Trở về</a>
    </div>
    <script>
        // Utility function to get a product by ID
        function getProductById(id) {
            return products.find(p => p.id === id);
        }

        // Utility function to get an order by ID
        function getOrderById(id) {
            return orders.find(o => o.id === id);
        }

        function viewOrderDetails(id) {
            const order = getOrderById(id);
            if (order) {
                document.getElementById('order-id').textContent = order.id;
                document.getElementById('customer-name').textContent = order.customerName;
                
                const productDetails = order.products.map(productItem => {
                    const product = getProductById(productItem.id);
                    return `
                        <div style="display: flex; align-items: center; margin: 5px; border-bottom: 1px solid #555; padding-bottom: 5px">
                            <img src="../view/${product.img}" style="max-width: 35px; margin-right: 5px;" alt="${product.name}">
                            <span>${product.name} (x${productItem.quantity})</span>
                        </div>
                    `;
                }).join('');

                document.getElementById('date-send-history').textContent = order.orderDate;
                document.getElementById('order-products').innerHTML = productDetails;
                document.getElementById('order-total').textContent = `${order.totalMoney}đ`;
                document.getElementById('delivery-method').textContent = order.deliveryMethod;
                document.getElementById('payment-method').textContent = order.paymentMethod;
                document.getElementById('phone-name').textContent = order.customerPhone;
                document.getElementById('promo-code').textContent = order.promoCode || 'N/A';
                document.getElementById('order-status').textContent = order.status;
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Retrieve the ID from the URL for the details page
            const urlParams = new URLSearchParams(window.location.search);
            const orderId = parseInt(urlParams.get('id'), 10);
    
            // Show order details
            if (!isNaN(orderId)) {
                viewOrderDetails(orderId);
            }
        });
    </script>
</main>
    <script type="text/javascript" src="../view/js/purchase_history.js"></script>
    <script>
        document.getElementById('back-button').addEventListener('click', () => {
            // Quay lại trang purchase_history.html
            window.location.href = 'index.php?act=purchase_history';
        });
    </script>