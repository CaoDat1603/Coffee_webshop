<?php
$this_id = $_GET['this_id'];
include "../model/edit_product.php";
include "../controller/function.php";
$row = getAllFeatureOfProduct($this_id);
?>

<link rel="stylesheet" href="../view/css/edit_product.css">
<main>
<div class="form-edit">
    <button onclick="location.href='../controller/index.php?act=manage-products'">Trở về</button>
    <hr>
    <h1 style="display: flex; justify-content: center;">Sửa sản phẩm: <?php echo $row['product_name']; ?></h1>
    <form method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div style="display: flex; gap: 10px;  align-items: center;">
            <p>Loại sản phẩm: </p>
            <select name="ca_id" style="width: 200px; height: 30px;">
                <option value="1" <?php if ($row['ca_id'] == 1) echo 'selected'; ?>>Caffe</option>
                <option value="2" <?php if ($row['ca_id'] == 2) echo 'selected'; ?>>Trà</option>
                <option value="3" <?php if ($row['ca_id'] == 3) echo 'selected'; ?>>Bánh</option>
            </select>
        </div>
        <p>Tên sản phẩm</p>
        <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" onfocus="clearError('product_name_error')">
        <span id="product_name_error" style="color: red; display: none;">Vui lòng nhập tên sản phẩm.</span>

        <div style="display: flex; gap:20px; justify-content:space-evenly; background-color:cornsilk; border-radius:10px;">
            <div>
                <p>Hình ảnh</p>
                <span><img src="../view/img/product/<?php echo $row['img']; ?>" alt="" width="50px" height="50px"></span>
            </div>
            <hr style="margin-left: 0; margin-right: 0;">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <p style="width: 100%;">Hình ảnh thay đổi: </p> 
                <span><img id="preview-img" src="#" alt="" width="50px" height="50px"  style="height: 240px; background-color:cornflowerblue"></span>
                <input type="file" name="img" accept="image/*" onchange="previewImage(event)">
            </div>
        </div>
        
        <p>Giá bán</p>
        <input type="text" name="price" value="<?php echo $row['price']; ?>" onfocus="clearError('price_error')">
        <span id="price_error" style="color: red; display: none;">Vui lòng nhập giá bán.</span>

        <hr>
        <div style="display: flex; justify-content: center;">
            <button type="button" id="br" onclick="showAddProductForm()">Edit</button>
        </div>
        <div id="backround-form-buttons" style="display: none;">
            <div class="form-yes" style="width: 30%; height: 30%;">
                <h2 style="justify-content: center; display: flex; height: 55%;">Bạn có chắc chắn Xác nhận sửa đổi không.</h2>
                <div class="form-buttons">
                    <button type="submit" id="submit br" name="btn">Xác nhận</button>
                    <button id ="br" type="button" name="cancel" onclick="hideAddProductForm()">Hủy</button>
                </div>
            </div>
        </div>
    </form>
</div>
</main>

<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('preview-img');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function showAddProductForm() {
    if (validateForm()) {
        document.getElementById('backround-form-buttons').style.display = 'flex';
    }
}

function hideAddProductForm() {
    document.getElementById('backround-form-buttons').style.display = 'none';
}

function validateForm() {
    let isValid = true;

    // Kiểm tra tên sản phẩm
    const productName = document.querySelector('input[name="product_name"]').value;
    if (!productName) {
        document.getElementById('product_name_error').style.display = 'inline';
        isValid = false;
    } else {
        document.getElementById('product_name_error').style.display = 'none';
    }

    // Kiểm tra giá bán
    const price = document.querySelector('input[name="price"]').value;
    if (!price) {
        document.getElementById('price_error').style.display = 'inline';
        isValid = false;
    } else {
        document.getElementById('price_error').style.display = 'none';
    }

    return isValid;
}

function clearError(errorId) {
    document.getElementById(errorId).style.display = 'none';
}

document.getElementById("br").addEventListener("click", function(event) {
    event.preventDefault();
});
</script>
