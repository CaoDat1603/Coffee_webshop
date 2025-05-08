<div id="notification-popup">
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
        window.location.href = 'index.php?act=edit_account';
    }

<?php
    include 'connect.php';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $user_id = $_SESSION['mySession_admin'];

    if (isset($_POST['btn'])) {
        $user_pass_old = $_POST['user_pass_old'];
        $user_pass_new_1 = $_POST['user_pass_new_1'];
        $user_pass_new_2 = $_POST['user_pass_new_2'];

        if ($user_pass_new_1 !== $user_pass_new_2) {
            echo "Mật khẩu mới không khớp.";
        }
        else{
            $sql = "SELECT * FROM `user` WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $user_pass = mysqli_fetch_assoc($result);


                if ($user_pass_old == $user_pass['user_pass']) {
                    $sql_update = "UPDATE `user` SET user_pass = '$user_pass_new_1' WHERE user_id = $user_id";

                    if (mysqli_query($conn, $sql_update)) {
                        echo "showNotification('Mật khẩu đã được thay đổi thành công!! (:');";
                        //header("Location: ../controller/index.php?act=edit_account");
                        //exit();
                    } else {
                        echo "showNotification('Có lỗi xảy ra khi thay đổi mật khẩu.');";
                    }
                } else {
                    echo "showNotification('Mật khẩu cũ không đúng!!');";
                }
            } else {
                echo "Lỗi truy vấn: " . mysqli_error($conn);
            }
        }

    mysqli_close($conn);
}
?>
</script>