<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin']) || !isset($_SESSION['mySession_level'])){
        header('location: ../view/sign_in.php');
    }
?>

<link rel="stylesheet" href="../view/css/admin.css">
    <main class="main">
        <div class="container-overview-all">
            <fieldset>
                <legend><h1>Tổng quan</h1></legend>
    
                <div class="overview-all">
                    <div class="overview-item">
                        <h2>20.000 ₫</h2>
                        <p>Thu nhập (Hằng quý)</p>
                    </div>
                    <div class="overview-item">
                        <h2>532.255.000 ₫</h2>
                        <p>Thu nhập (Hằng năm)</p>
                    </div>
                    <div class="overview-item">
                        <h2>130.342</h2>
                        <p>Tài khoản khách hàng</p>
                    </div>
                    <div class="overview-item">
                        <h2>20</h2>
                        <p>Đơn hàng (Đang đợi)</p>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="overview-diagram">
            <div class="overview-diagram-item">
                <h2>Doanh thu hằng Quý</h2>
                <div style="display: flex; gap: 10px; flex-direction: column; width: 450px;">
                    <select id="yearSelector"></select>
                    <canvas id="revenueChart" width="450" height="300"></canvas>
                </div>
            </div>

            <div class="overview-diagram-item">
                <h2>Tổng quan Sản Phẩm đã bán</h2>
                <div style="display: flex; align-items: center; gap: 50px; width: 600px;">
                    <canvas id="productDistributionChart" width="350" height="350"></canvas>
                    <div id="legend"></div>
                </div>
            </div>
        </div>
    </main>
    <script src="../view/js/admin.js"></script>
    <script src="../view/js/analyst.js"></script>
</body>
</html>
