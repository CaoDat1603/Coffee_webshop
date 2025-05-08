<div id="notification-popup">
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
        window.location.href = 'index.php?act=edit_account';
    }

<?php
    include "connect.php";
    include "../controller/function.php";
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = $_SESSION['mySession'];
    
    if(isset($_POST['btn'])){
        $user_name = $_POST['user_name'];
        $phone_number = $_POST['phone_number'];

        $sql = "SELECT COUNT(*) FROM user WHERE phone_number = '$phone_number'";
        $result = mysqli_query($conn, $sql);
        $row_phone = mysqli_fetch_array($result);

        if ($row_phone[0] > 0 && $phone_number != getUserInfor($user_id, "phone_number") ) {
            echo "showNotification('Số điện thoại đã được sử dụng!!');";
        }
        else{
            $sql = "UPDATE `user` SET user_name = '$user_name', phone_number ='$phone_number' WHERE user_id = '$user_id'";
        
            if(mysqli_query($conn, $sql)){
                echo "showNotification('Cập nhập thông tin thành công!!');";
            }
            else{
                echo "sai";
            }
        }
        
    }
?>
</script>