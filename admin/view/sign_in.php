<?php include "../model/sign_in.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <link rel="icon" type="image" href="img/logo-tap.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        html, body, main {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        /*--Css Main--*/
        div {
            display: block;
            unicode-bidi: isolate;
        }

        form {
            display: block;
            margin-top: 0rem;
            unicode-bidi: isolate;
        }

        .all {
            height: 100%;
            width: 100%;
            background-color: rgb(69, 74, 77);
            background-image: url(../view/img/sign_in.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; 
        }

        .form-main {
            background-image: url(../view/img/logo.png); 
            background-size: contain; 
            background-repeat: no-repeat; 
            background-position: left;
            margin: 0 200px 0 200px;
            min-height: 600px;
            max-width: 1300px;
            justify-content: flex-end;
            align-items: center;
            display: flex;
        }

        .element {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .ft-main {
            width: 400px;
            background-color: aliceblue;
            border-radius: 4px;
            overflow: hidden;
            box-sizing: border-box;
            box-shadow: 0 3px 10px 0 rgb(202, 198, 191);
        }

        .Title-form {
            box-sizing: border-box;
            min-height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-form {
            padding: 1.375rem 30px;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            display: flex;
        }

        .Tl-form {
            font-size: 1.25rem;
            max-width: 8.5rem;
            flex-shrink: 0;
        }

        .form-sign-up {
            overflow: hidden;
            padding: 0 30px 30px;
        }

        .input {
            margin-bottom: 10px;
        }

        .id-ac, .password {
            border: 1px solid rgb(53, 51, 51);
            border-radius: 2px;
            box-shadow: inset 0 2px 0 black;
            box-sizing: border-box;
            height: 2.5rem;
            overflow: hidden;
            width: 100%;
            align-items: center;
            display: flex;
        }

        .input-id, .input-password {
            border: 0;
            filter: none;
            flex: 1;
            flex-shrink: 0;
            outline: none;
            padding: .75rem;
        }

        input, .input2 {
            line-height: normal;
        }

        input, button {
            color: inherit;
            font: inherit;
            margin: 0;
        }

        .id-error, .password-error {
            color: rgb(69, 74, 77);
            font-size: .75rem;
            margin: 0;
            min-height: 1rem;
            padding: .25rem 0 0;
        }

        .reset-pass {
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .reset {
            font-size: .75rem;
            color: blue;
        }

        .reset-pass >a {
            text-decoration: none;
            background-color: transparent;
        }

        .creat:disabled {
            cursor: not-allowed;
            opacity: .7;
        }

        .creat {
            margin-top: 50px;
            margin-bottom: 20px;
            width: 100%;
            background-color: black;
            box-shadow: rgb(69, 74, 77);
            color: white;
            text-transform: uppercase;
            height: 2.5rem;
            min-width: 8.75rem;
        }

        .creat:hover {
            background-color: rgb(69, 74, 77);
        }

        .line-or {
            padding: 20px;
            display: flex;
            align-items: center;
        }

        .p__MPF {
            height: 1px;
            background-color: #ccc;
            width: 100%;
        }

        .MPD {
            color: #ccc;
            font-size: .75rem;
            padding: 0 16px;
            text-transform: uppercase;
        }
        /*--Setting media--*/
        @media (max-width: 1092px) {
            .all {
                height: auto;
            }
            .header {
                padding: 15px 100px;
            }

            .form-main {
                height: 1100px;
                margin: auto auto;
                background-position-x: center;
                background-position-y: bottom;
                background-size: 650px;
                justify-content: baseline;
                align-items: baseline;
            }

            .element {
                margin-top: 100px;
                justify-content:center;
            }
        }

        @media (max-width: 476px) {
            .form-main {
                background-size: 500px;
                height: 940px;
            }
        }
        /* Confirmation box */
.confirmation-box, #notification-popup {
    display: none;
    flex-direction: column;
    opacity: 1;
    pointer-events: all;
    z-index: 1000;
    height: 100vh;
    background: rgba(0, 0, 0, 0.5);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    transition: opacity 0.25s ease-in-out;
    justify-content: center;
    align-items: center;
}

.form-yes, .notification-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.form-yes h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-buttons {
    display: flex;
    justify-content: space-around;
    width: 100%;
    gap: 20px;
}

.form-buttons button {
    width: 100%;
}

.button-ex, #confirm-btn-yes {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.button-ex, #cancel-btn {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

#confirm-btn-yes:hover {
    background-color: #218838;
}

#cancel-btn:hover, .button-ex:hover {
    background-color: #c82333;
}
    </style>
</head>
<body>
    
    <main class="main">
        <div class="all">
            <div style="height: 100%; display: flex; flex-direction: column; justify-content: center;">
                <div class="form-main">
                    <div class="element">
                        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;"></div>
                        <div class="ft-main">
                            <div class="Title-form">
                                <div class="header-form">
                                    <div class="Tl-form">Đăng nhập</div>
                                </div>
                            </div>
                            <div class="form-sign-up">
                                <form method="POST" >
                                    <div class="input">
                                        <div class="id-ac">
                                            <input id="phonesigupin" class="input-id" type="text" placeholder="Số điện thoại" autocomplete="tel" name="phone_number" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div id="id-error" aria-live="polite"></div>
                                    <div class="line-or">
                                        <div class="p__MPF"></div>
                                        <span class="MPD">###</span>
                                        <div class="p__MPF"></div>
                                    </div>
                                    <div class="input2">
                                        <div class="password">
                                            <input id="passigin"  class="input-password" type="password" placeholder="Mật khẩu" autocomplete="tel" name="user_pass" aria-invalid="false">
                                        </div>
                                        <span class="error-message" id="passigin-error" style="font-size: 13px; color: red;"></span>
                                    </div>
                                    <!--<div class="reset-pass"><a class="reset" href="#">Quên mật khẩu</a></div>-->
                                    <button class="creat" type="submit" name="submit" disabled>Đăng nhập</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const phoneInput = document.getElementById('phonesigupin');
    const passwordInput = document.getElementById('passigin');
    const loginButton = document.querySelector('.creat');
    const passwordError = document.getElementById('passigin-error'); // Định nghĩa biến này

    function validatePhone(phone) {
        const phoneRegex = /^\d{10}$/; 
        return phoneRegex.test(phone);
    }

    // Hàm kiểm tra xem các trường có hợp lệ không
    function validateInputs() {
        const isPhoneValid = validatePhone(phoneInput.value.trim());
        const isPasswordValid = validatePassword(passwordInput.value.trim());

        // Kiểm tra mật khẩu
        if (!isPasswordValid && passwordInput.value.trim() !== '') {
            passwordError.textContent = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ cái viết hoa, chữ cái viết thường và số.";
        } else {
            passwordError.textContent = ""; // Xóa thông báo lỗi nếu mật khẩu hợp lệ
        }

        // Kích hoạt hoặc vô hiệu hóa nút đăng nhập
        loginButton.disabled = !(isPhoneValid && isPasswordValid);
    }

    // Hàm kiểm tra mật khẩu
    function validatePassword(password) {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
        return passwordRegex.test(password);
    }
    
    // Thêm sự kiện lắng nghe cho các trường nhập liệu
    phoneInput.addEventListener('input', validateInputs);
    passwordInput.addEventListener('input', validateInputs);
});
</script>

