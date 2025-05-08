
<link rel="stylesheet" type="text/css" href="../view/css/styleNotificationDetail.css">
    <!--main section-->
    <main class="main">
        <div class="page-heading">
            <div class="container">
                <ul class="breadcrumb">
                    <li>Trang chủ</a></li> /
                    <li>Thông báo</li> /
                    <li id="page-active">Trang hiện tại</li>
                </ul>
                <div id="date-send" style="padding-top: 10px; color: #a5a2a2; font-size: 12px;">Ngày gửi</div>
                <hr>
            </div>
        </div>
        <div class="notification-container">
            <h1 id="notification-title">Tiêu đề thông báo</h1>
            <div style="display: flex; width: 100%; align-items: center; justify-content: center; padding-bottom: 5px;">
                <div class="line-tt-pg"></div>
                <img class="img-tt-pg" src="../view/img/logo.png">
                <div class="line-tt-pg"></div>
            </div>
            <div class="contents">
                <p id="notification-content">Nội dung thông báo...</p>
            </div>
            <a href="#" id="back-button" class="back-button">Trở về</a>
        </div>
    
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Lấy ID thông báo từ URL
                const urlParams = new URLSearchParams(window.location.search);
                const notificationId = parseInt(urlParams.get('id'), 10);
    
                // Lấy danh sách thông báo từ localStorage
                const messages = JSON.parse(localStorage.getItem('messages')) || [];
    
                // Tìm thông báo theo ID
                const message = messages.find(msg => msg.id === notificationId);
    
                // Hiển thị tiêu đề và nội dung thông báo
                if (message) {
                    document.getElementById('notification-title').textContent = message.title;
                    document.getElementById('page-active').textContent = message.title;
                    document.getElementById('date-send').textContent = message.date;
                    document.getElementById('notification-content').textContent = message.content;
                } else {
                    document.getElementById('notification-title').textContent = 'Thông báo không tìm thấy';
                    document.getElementById('notification-content').textContent = 'Thông báo này không còn tồn tại.';
                }
    
                // Xử lý nút quay lại
                const backButton = document.getElementById('back-button');
                const returnPage = sessionStorage.getItem('returnPage') || 'index.php'; // Mặc định quay về index.php nếu không có returnPage
                const scrollTop = sessionStorage.getItem('scrollTop') || 0; // Mặc định về vị trí cuộn 0 nếu không có scrollTop
    
                backButton.href = returnPage; // Đặt href của nút quay lại
    
                // Khi quay lại trang, khôi phục vị trí cuộn
                backButton.addEventListener('click', () => {
                    sessionStorage.setItem('scrollTop', scrollTop); // Lưu lại vị trí cuộn trước khi rời trang
                });
            });
    
            // Khi quay lại trang, khôi phục vị trí cuộn
            window.addEventListener('load', () => {
                const scrollTop = sessionStorage.getItem('scrollTop') || 0;
                window.scrollTo(0, parseInt(scrollTop, 10)); // Khôi phục vị trí cuộn
            });
        </script>
    </main>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>
