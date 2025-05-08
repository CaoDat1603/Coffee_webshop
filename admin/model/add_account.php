<div id="notification-popup" style="display: none;">
    <div class="notification-content" style="width: 30%; height: 20%;">
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
        window.location.href = '../controller/index.php?act=manage-accounts';
    }


<?php 
    include "connect.php";

    if (isset($_POST['add'])) {
        $user_name = $_POST['user_name'];
        $user_pass = $_POST['user_pass'];
        $phone_number = $_POST['phone_number'];
        $level = $_POST['level'];

        $sql = "SELECT COUNT(*) FROM user WHERE phone_number = '$phone_number'";
        $result = mysqli_query($conn, $sql);
        $row_phone = mysqli_fetch_array($result);

        if ($row_phone[0] > 0) {
            echo "showNotification('Số điện thoại đã được sử dụng!!');";
        }
        else{
            $sql = "INSERT INTO `user` (user_name, user_pass, phone_number, level) 
                VALUES ('$user_name', '$user_pass', '$phone_number', '$level')";


            if (mysqli_query($conn, $sql)) {
                echo "showNotification('Thêm tài khoản mới thành công');";
            
            } else {
                echo "<script>
                alert('Lỗi: " . mysqli_error($conn) . "');
                </script>";
            }
        }

        
    }
?>
</script>