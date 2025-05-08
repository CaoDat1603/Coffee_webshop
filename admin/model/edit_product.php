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
        window.location.href = '../controller/index.php?act=manage-products';
    }
</script>
<?php
    include 'connect.php';
    $sql = "SELECT * FROM product WHERE product_id = '$this_id'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    // Then, we press edit button.
    if(isset($_POST['btn'])){
        $ca_id = $_POST['ca_id'];
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];
        $img = $_FILES['img']['name'];//only get photo name
        $img_tmp_name = $_FILES['img']['tmp_name']; // get path of photo
        if($img == NULL){
            $sql = "UPDATE product SET ca_id = '$ca_id', product_name ='$product_name', price = '$price' WHERE product_id = '$this_id' ";
        }else{
            $sql = "UPDATE product SET ca_id = '$ca_id', product_name ='$product_name', price = '$price', img = '$img' WHERE product_id = '$this_id' ";
        }
        if(mysqli_query($conn, $sql)){
            if($row['img'] != $img && $img != NULL){
                move_uploaded_file($img_tmp_name, '../view/img/product/'.$img);
                
                copy('../view/img/product/'.$img, '../../customer2/view/img/product/'.$img);
            }
            echo "<script>
                showNotification('Cập nhập thành công!!');
            
            </script>";
        }
        else{
            echo "sai";
        }
    
    }

?>


