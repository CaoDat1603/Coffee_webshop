<link rel="stylesheet" type="text/css" href="../view/css/styleProduct.css">
<?php include "../model/product.php"; ?>  
    <!--main section-->
    <main class="main">
        <div class="filter-products">
            <div class="filter-product">
                <a class="filter-option active" data-filter="all" href="#">Tất cả</a>
                <a class="filter-option" data-filter="1" href="#">Caffee</a>
                <a class="filter-option" data-filter="2" href="#">Trà</a>
                <a class="filter-option" data-filter="3" href="#">Bánh</a>
            </div>
        </div>
        <div class="product-main">
            <section class="contain-items">
                <ul class="row search-result-items">
                <?php
                    foreach ($products as $row) {
                ?>      
                        <li class="product-item" data-category="<?php echo $row['ca_id']; ?>">
                            <a href="index.php?act=product-detail&this_id=<?php echo $row['product_id']; ?>" class="tag-product" style="text-decoration: none;">
                                <img src="../view/img/product/<?php echo $row['img']; ?>" alt="<?php echo $row['product_name']; ?>">
                                <h2><?php echo $row['product_name']; ?></h2>
                                <h3 class="price"><?php echo $row['price']; ?><u>đ</u></h3>
                            </a>
                            <div class="add-cart">
                                <button class="add-to-cart" data-product-id="<?php echo $row['product_id']; ?>" data-product-name="<?php echo $row['product_name']; ?>" data-product-price="<?php echo $row['price']; ?>" data-product-img="../view/img/product/<?php echo $row['img']; ?>">
                                    <i class='bx bx-cart-add'></i>
                                    <p>Đặt mua</p>
                                </button>
                                <input type="number" value="1" min="1" class="product-quantity" data-product-id="<?php echo $row['product_id']; ?>">
                            </div>
                        </li>
                <?php }
                ?>

                    <!-- <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=2" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/cf-whiteSocola.png" alt="Product 2">
                            <h2>Caffee Socola-Trắng</h2>
                            <h3 class="price">25.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="2" data-product-name="Caffee Socola-Trắng" data-product-price="25.000đ" data-product-img="../view/img/cf-whiteSocola.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="2">
                        </div>
                    </li>  

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=3" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Cappuccino.png" alt="Product 3">
                            <h2>Cappuccino</h2>
                            <h3 class="price">30.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="3" data-product-name="Cappuccino" data-product-price="30.000đ" data-product-img="../view/img/Cappuccino.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="3">
                        </div>
                    </li>  

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=4" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Cold Brew Cam Úc.png" alt="Product 4">
                            <h2>Cold Brew Cam Úc</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="4" data-product-name="Cold Brew Cam Úc" data-product-price="50.000đ" data-product-img="../view/img/Cold Brew Cam Úc.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="4">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=5" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Cold Brew Sữa Hạnh Nhân.png" alt="Product 5">
                            <h2>Cold Brew Hạnh Nhân</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="5" data-product-name="Cold Brew Hạnh Nhân" data-product-price="50.000đ" data-product-img="../view/img/Cold Brew Sữa Hạnh Nhân.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="5">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=6" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Cold Brew Dâu Tây.png" alt="Product 6">
                            <h2>Cold Brew Dâu Tây</h2>
                            <h3 class="price">70.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="6" data-product-name="Cold Brew Dâu Tây" data-product-price="70.000đ" data-product-img="../view/img/Cold Brew Dâu Tây.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="6">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=7" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Cold Brew Macchiato.png" alt="Product 7">
                            <h2>Cold Brew Macchiato</h2>
                            <h3 class="price">70.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="7" data-product-name="Cold Brew Macchiato" data-product-price="70.000đ" data-product-img="../view/img/Cold Brew Macchiato.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="7">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=8" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Coffee Jelly.png" alt="Product 8">
                            <h2>Coffee Jelly</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="8" data-product-name="Coffee Jelly" data-product-price="50.000đ" data-product-img="../view/img/Coffee Jelly.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="8">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=9" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Dalgona Coffee.png" alt="Product 9">
                            <h2>Dalgona Coffee</h2>
                            <h3 class="price">65.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="9" data-product-name="Dalgona Coffee" data-product-price="65.000đ" data-product-img="../view/img/Dalgona Coffee.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="9">
                        </div>
                    </li> 

                    <li class="product-item" data-category="caffee">
                        <a href="index.php?act=product-detail&id=10" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Boozy Whipped Coffee.png" alt="Product 10">
                            <h2>Boozy Whipped Coffee</h2>
                            <h3 class="price">65.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="10" data-product-name="Boozy Whipped Coffee" data-product-price="65.000đ" data-product-img="../view/img/Boozy Whipped Coffee.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="10">
                        </div>
                    </li> 

                    <li class="product-item" data-category="tra">
                        <a href="index.php?act=product-detail&id=11" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Matcha Espresso.png" alt="Product 11">
                            <h2>Matcha Espresso</h2>
                            <h3 class="price">70.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="11" data-product-name="Matcha Espresso" data-product-price="70.000đ" data-product-img="../view/img/Matcha Espresso.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="11">
                        </div>
                    </li> 

                    <li class="product-item" data-category="tra">
                        <a href="index.php?act=product-detail&id=12" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Trà Đá Mận (Maesil).png" alt="Product 12">
                            <h2>Trà Đá Mận (Maesil)</h2>
                            <h3 class="price">70.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="12" data-product-name="Trà Đá Mận (Maesil)" data-product-price="70.000đ" data-product-img="../view/img/Trà Đá Mận (Maesil).png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="12">
                        </div>
                    </li> 

                    <li class="product-item" data-category="tra">
                        <a href="index.php?act=product-detail&id=13" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Trà Hoa Oải Hương.png" alt="Product 13">
                            <h2>Trà Hoa Oải Hương</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="13" data-product-name="Trà Hoa Oải Hương" data-product-price="50.000đ" data-product-img="../view/img/Trà Hoa Oải Hương.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="13">
                        </div>
                    </li>

                    <li class="product-item" data-category="tra">
                        <a href="index.php?act=product-detail&id=14" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Trà Chanh Giây.png" alt="Product 14">
                            <h2>Trà Chanh Giây</h2>
                            <h3 class="price">30.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="14" data-product-name="Trà Chanh Giây" data-product-price="30.000đ" data-product-img="../view/img/Trà Chanh Giây.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="14">
                        </div>
                    </li>

                    <li class="product-item" data-category="tra">
                        <a href="index.php?act=product-detail&id=15" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Trà Earl Grey.png" alt="Product 15">
                            <h2>Trà Earl Grey</h2>
                            <h3 class="price">45.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="15" data-product-name="Trà Earl Grey" data-product-price="45.000đ" data-product-img="../view/img/Trà Earl Grey.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="15">
                        </div>
                    </li>

                    <li class="product-item" data-category="banh">
                        <a href="index.php?act=product-detail&id=16" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Chocolate Mousse.png" alt="Product 16">
                            <h2>Chocolate Mousse</h2>
                            <h3 class="price">75.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="16" data-product-name="Chocolate Mousse" data-product-price="75.000đ" data-product-img="../view/img/Chocolate Mousse.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="16">
                        </div>
                    </li>

                    <li class="product-item" data-category="banh">
                        <a href="index.php?act=product-detail&id=17" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Croissant Kem Dâu.png" alt="Product 17">
                            <h2>Croissant Kem Dâu</h2>
                            <h3 class="price">80.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="17" data-product-name="Croissant Kem Dâu" data-product-price="80.000đ" data-product-img="../view/img/Croissant Kem Dâu.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="17">
                        </div>
                    </li>

                    <li class="product-item" data-category="banh">
                        <a href="index.php?act=product-detail&id=18" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Matcha Tiramisu.png" alt="Product 18">
                            <h2>Matcha Tiramisu</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="18" data-product-name="Matcha Tiramisu" data-product-price="50.000đ" data-product-img="../view/img/Matcha Tiramisu.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="18">
                        </div>
                    </li>

                    <li class="product-item" data-category="banh">
                        <a href="index.php?act=product-detail&id=19" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Rose Panna Cotta.png" alt="Product 19">
                            <h2>Rose Panna Cotta</h2>
                            <h3 class="price">50.000<u>đ</u></h3>
                        </a>                        
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="19" data-product-name="Rose Panna Cotta" data-product-price="50.000đ" data-product-img="../view/img/Rose Panna Cotta.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="19">
                        </div>
                    </li>

                    <li class="product-item" data-category="banh">
                        <a href="index.php?act=product-detail&id=20" class="tag-product" style="text-decoration: none;">
                            <img src="../view/img/Vanilla Dream Crepes.png" alt="Product 20">
                            <h2>Vanilla Dream Crepes</h2>
                            <h3 class="price">85.000<u>đ</u></h3>
                        </a>                        
                        <div class="add-cart">
                            <button class="add-to-cart" data-product-id="20" data-product-name="Vanilla Dream Crepes" data-product-price="85.000đ" data-product-img="../view/img/Vanilla Dream Crepes.png">
                                <i class='bx bx-cart-add'></i>
                                <p>Đặt mua</p>
                            </button>
                            <input type="number" value="1" min="1" class="product-quantity" data-product-id="20">
                        </div> -->
                    <!-- </li> -->
                </ul>
            </section>
        </div>
        <div class="pagination">
            <div style="border: 2px solid #555; padding: 5px 10px; border-radius: 5px;">
                <button class="prev-page" onclick="changePage(-1)">Previous</button>
                <span class="page-numbers"></span>
                <button class="next-page" onclick="changePage(1)">Next</button>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="../view/js/product.js"></script>
    <script type="text/javascript" src="../view/js/script.js"></script>
</body>
</html>