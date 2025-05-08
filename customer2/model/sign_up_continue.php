<?php
include "connect.php";

// Hàm kiểm tra tính hợp lệ của mật khẩu
function validate_password($password) {
    if (strlen($password) < 8) {
        return false;
    }
    if (!preg_match("/[A-Z]/", $password)) {
        return false;
    }
    if (!preg_match("/[a-z]/", $password)) {
        return false;
    }
    if (!preg_match("/[0-9]/", $password)) {
        return false;
    }
    return true;
}

if (isset($_POST['validate'])) {
    $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
    $user_pass = mysqli_real_escape_string($conn, $_POST["user_pass"]);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $level = 1;

    // Kiểm tra mật khẩu hợp lệ
    if (validate_password($user_pass)) {
        // Kiểm tra mật khẩu có tồn tại với người dùng khác không
        $sql = "SELECT COUNT(*) AS count_pass FROM user WHERE user_pass = '$user_pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count_pass = $row['count_pass'];

        if ($count_pass > 0) {
            echo "Mật khẩu đã tồn tại!";
        } else {
            // Thêm người dùng mới vào cơ sở dữ liệu
            $sql_add = "INSERT INTO user (user_name, user_pass, phone_number, level) VALUES ('$user_name', '$user_pass', '$phone_number', $level)";
            if (mysqli_query($conn, $sql_add)) {
                header("Location: ../view/sign_in.php");
                exit(); // Dừng script sau khi chuyển hướng
            } else {
                echo "Lỗi: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Mật khẩu không hợp lệ. Nó phải có ít nhất 8 ký tự, bao gồm chữ cái viết hoa, chữ cái viết thường và số.";
    }
}

mysqli_close($conn);
?>
