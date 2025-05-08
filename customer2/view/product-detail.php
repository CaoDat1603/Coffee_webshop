<link rel="stylesheet" type="text/css" href="../view/css/styleProductDetail.css">
<?php include "../model/product_detail.php"; ?>
    <main class="main">
            <li class="product-item" data-category="<?php echo $product['ca_id']; ?>">
                <div  class="product-image">
                    <img src="../view/img/product/<?php echo $product['img']; ?>" alt="<?php echo $product['product_name']; ?>">
                </div>
                <div class="product-details">
                    <h2>Tên sản phẩm: </h2>
                    <h2 class="product-title"><?php echo $product['product_name']; ?></h2>
                    <p class="product-code">Mã sản phẩm: <?php echo $product['product_id']; ?></p>
                    <h3 class="price">Giá: <?php echo $product['price']; ?><u>đ</u></h3>
                    <div class="quantity-container">
                        <hr style="margin-bottom: 20px;">
                        <label for="quantity">Chọn số lượng</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="product-quantity" data-product-id="1">
                        <hr style="margin-top: 20px;">
                    </div>
                    
                    <div class="add-cart">
                        <button class="add-to-cart" data-product-id="1" data-product-name="Cafee Đen Đá" data-product-price="20.000đ" data-product-img="../view/img/cfden.png">
                            <i class='bx bx-cart-add'></i>
                            <p>Đặt mua</p>
                        </button>
                    </div>
                </div>
            </li>
    </main>
    <script type="text/javascript" src="../view/js/product.js"></script>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>