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
        window.location.href = '../view/sign_in.php';
    }
<?php 
    include "connect.php";

    session_start();

    if(isset($_POST['submit'])){
        $phone_number = $_POST['phone_number'];
        $user_pass = $_POST['user_pass'];

        $sql = "SELECT* FROM user WHERE phone_number = '$phone_number' AND user_pass = '$user_pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);
            $_SESSION['mySession'] = $user['user_id'];
            header("location:../controller/index.php");
        }else{
            echo "showNotification('Số điện thoại không hợp lệ hoặc Mật khẩu sai!!');";
        }
    }
?>
</script>