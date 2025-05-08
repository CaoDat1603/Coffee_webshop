<div id="notification-popup" style="display: none;">
    <div class="notification-content">
        <h2 id="notification-message" style="justify-content: center; display: flex; height: 55%;"></h2>
        <div class="form-buttons" style="width: 100%; align-items: center; flex-direction: column;">
            <button class="button-ex" onclick="closeNotification()">Đóng</button>
        </div>
    </div>
</div>

<script>
    function showNotification(message) {
        document.getElementById('notification-message').innerText = message;
        document.getElementById('notification-popup').style.display = 'flex';
    }

    function closeNotification() {
        document.getElementById('notification-popup').style.display = 'none';
        window.history.back();
    }
</script>

<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $phone_number = $_POST['phone_number'];

    // Kiểm tra số điện thoại đã được sử dụng
    $sql = "SELECT COUNT(*) FROM user WHERE phone_number = '$phone_number'";
    $result = mysqli_query($conn, $sql);
    $row_phone = mysqli_fetch_array($result);

    if ($row_phone[0] > 0) {
        // Nếu số điện thoại đã được sử dụng, hiển thị thông báo lỗi
        echo "<script>
                showNotification('Số điện thoại đã được sử dụng!');
              </script>";
    } else {
        // Nếu số điện thoại chưa được sử dụng, chuyển hướng tới trang sign_up_continue.php
        ?>
        <form action="../view/sign_up_continue.php" method="post">
            <input type="hidden" name="phone_number" value="<?php echo $phone_number; ?>">
            <script>
                document.forms[0].submit();
            </script>
        </form>
        <?php
    }
}

mysqli_close($conn);
?>
