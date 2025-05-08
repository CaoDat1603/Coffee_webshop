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
        window.location.href = 'index.php?act=manage-products';
    }


<?php 
    include "connect.php";
    include "../controller/function.php";

    if (isset($_POST['submit'])) {
        $ca_id = $_POST['ca_id'];
        $pro_name = $_POST['pro_name'];
        $image = $_FILES['img']['name'];  // Lấy tên của ảnh
        $image_tmp_name = $_FILES['img']['tmp_name'];  // Lấy đường dẫn tạm thời của ảnh
        $price = $_POST['price'];
        $status = "hidden";

        // Câu truy vấn SQL để thêm sản phẩm mới vào cơ sở dữ liệu
        $sql = "INSERT INTO product (ca_id, product_name, price, img, status) 
                VALUES ('$ca_id', '$pro_name', '$price', '$image', '$status')";

        // Thực hiện truy vấn
        if (mysqli_query($conn, $sql)) {
            // Di chuyển file ảnh đã tải lên vào thư mục "img/product/"
            move_uploaded_file($image_tmp_name, '../view/img/product/' . $image);
            copy('../view/img/product/'.$image, '../../customer2/view/img/product/'.$image);

            echo "showNotification('Thêm sản phẩm mới thành công');";
            //exit();
        } else {
            echo "<script>
            alert('Lỗi: " . mysqli_error($conn) . "');
            </script>";
        }
    }
    $qantity_of_product = count(getProducts());
    $qantity_of_coffee = count(getProductType(1));
    $qantity_of_tea = count(getProductType(2));
    $qantity_of_cake = count(getProductType(3));
    $conn -> close();
?>
</script>