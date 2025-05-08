<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['mySession_admin'])){
        header('location: ../view/sign_in.php');
    }
?>

<link rel="stylesheet" href="../view/css/notifications.css">

    <main>  
        <div class="container-overview-all">
            <fieldset>
                <legend><h1>Tổng quan Thông Báo</h1></legend>
    
                <div class="overview-all">
                    <div class="overview-item">
                        <h2>3</h2>
                        <p>Tổng số Thông báo</p>
                    </div>
                    <div class="overview-item">
                        <h2>2</h2>
                        <p>Thông báo (Đã gửi)</p>
                    </div>
                    <div class="overview-item">
                        <h2>1</h2>
                        <p>Thông báo (Chưa giửi)</p>
                    </div>
                </div>
            </fieldset>
        </div>

        <form class="search-container">
            <input type="search" class="search-input" placeholder="Tìm kiếm..." aria-label="Search">
            <button class="search-button" aria-label="Search Button"><i class='bx bx-search'></i></button>
        </form>

        <button class="add-notification-button" onclick="showAddNotificationForm()">Thêm Thông Báo</button>

        <div id="addNotificationForm" style="display: none;">
            <form class="formcsla">
                <h3>Thêm Thông Báo Mới</h3>
                <label for="notificationTitle">Tiêu đề:</label>
                <input type="text" id="notificationTitle" required><br>
                <label for="notificationContent">Nội dung:</label>
                <textarea id="notificationContent" required></textarea><br>
                <label for="notificationDate">Ngày:</label>
                <input type="date" id="notificationDate" required><br>
                <label for="notificationSender">Người gửi:</label>
                <input type="text" id="notificationSender" required><br>
                <label for="notificationRecipient">Người nhận:</label>
                <input type="text" id="notificationRecipient" required><br>
                <div class="form-buttons">
                    <button type="button" onclick="addNotification()">Lưu Thông Báo</button>
                    <button type="button" onclick="hideAddNotificationForm()">Hủy</button>
                </div>
            </form>
        </div>

        <!-- Edit Notification Form -->
        <div id="editNotificationForm" style="display: none;">
            <form class="formcsla">
                <h2>Chỉnh sửa Thông Báo</h2>
                <label for="editNotificationTitle">Tiêu đề:</label>
                <input type="text" id="editNotificationTitle" required><br>
                <label for="editNotificationContent">Nội dung:</label>
                <textarea id="editNotificationContent" required></textarea><br>
                <label for="editNotificationDate">Ngày:</label>
                <input type="date" id="editNotificationDate" required><br>
                <label for="editNotificationSender">Người gửi:</label>
                <input type="text" id="editNotificationSender" required><br>
                <label for="editNotificationRecipient">Người nhận:</label>
                <input type="text" id="editNotificationRecipient" required><br>
                <div class="form-buttons">
                    <button type="button" id="saveNotificationButton">Lưu Thay Đổi</button>
                    <button type="button" onclick="hideEditNotificationForm()">Hủy</button>
                </div>
            </form>
        </div>

        <div id="confirmationModal" style="display: none;">
            <div class="modal-content">
                <h3>Bạn có chắc muốn xóa Thông báo này không?</h3>
                <div class="modal-buttons">
                    <button id="confirmDelete" onclick="confirmDelete()">Có, Xóa</button>
                    <button id="cancelDelete" onclick="cancelDelete()">Hủy</button>
                </div>
            </div>
        </div>

        <!-- Detail Notification Modal -->
        <div id="detailNotificationModal" style="display: none;">
            <div class="modal-content">
                <h2>Chi tiết Thông Báo</h2>
                <p><strong>Tiêu đề:</strong> <span id="detailNotificationTitle"></span></p>
                <p><strong>Nội dung:</strong> <span id="detailNotificationContent"></span></p>
                <p><strong>Ngày:</strong> <span id="detailNotificationDate"></span></p>
                <p><strong>Người gửi:</strong> <span id="detailNotificationSender"></span></p>
                <p><strong>Người nhận:</strong> <span id="detailNotificationRecipient"></span></p>
                <button onclick="hideDetailNotificationModal()">Đóng</button>
            </div>
        </div>

        <div id="notification-list" style="background-color: rgb(147, 201, 203); padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <!-- notifications will be grouped and listed here -->
        </div>
    </main>

    <script src="../view/js/admin.js"></script>
    <script src="../view/js/notifications.js"></script>
</body>
</html>
