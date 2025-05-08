<?php include "../model/get_rand_product.php"; ?>

<link rel="stylesheet" type="text/css" href="../view/css/style.css">
<main class="main">
        <section class="main-header">
            <div class="img-main-head">
                <img src="../view/img/gioithieu01.jpg" alt="image Header">
                <div class="background-main-img"></div>
            </div>
            <div class="text-containt-header">
                <div class="logo-main-header"><img src="../view/img/logo.png"></div>
                <div class="ct-text-main-hd">
                    <div class="title-main-header"><h1>COFFEE MONSTER</h1></div>
                    <div class="contain-main-header">
                        <h2>Nơi trải nghiệm, và sự hài lòng của bạn</h2>
                    </div>
                    <div class="contain-main-header">
                        <h2>được chúng tôi đặt lên hàng đầu</h2>
                    </div> 
                    <a class="h-main-button" href="index.php?act=product"><button>SHOPING NOW</button></a>                  
                </div>
            </div>
        </section>
        
        <section class="main-main">
            <div class="hot-product">
            <div class="title-and-views">
                <h2>Sản phẩm nổi bật</h2>
            </div>
            <section class="contain-items">
                <ul class="row search-result-items">
                    <?php foreach ($products as $product): ?>
                        <li class="product-item" data-category="caffee">
                            <a href="index.php?act=product-detail&this_id=<?php echo $product['product_id']; ?>" class="tag-product" style="text-decoration: none;">
                                <img src="../view/img/<?php echo htmlspecialchars($product['img']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                                <h2><?php echo htmlspecialchars($product['product_name']); ?></h2>
                                <h3 class="price"><?php echo $product['price']; ?><u>đ</u></h3> 
                            </a>
                            <div class="add-cart">
                                <button class="add-to-cart" 
                                        data-product-id="<?php echo $product['product_id']; ?>" 
                                        data-product-name="<?php echo htmlspecialchars($product['product_name']); ?>" 
                                        data-product-price="<?php echo $product['price']; ?>đ" 
                                        data-product-img="../view/img/<?php echo htmlspecialchars($product['img']); ?>">
                                    <i class='bx bx-cart-add'></i>
                                    <p>Đặt mua</p>
                                </button>
                                <input type="number" value="1" min="1" class="product-quantity" data-product-id="<?php echo $product['product_id']; ?>">
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            </div>

            <div class="containt-first">
                <img class="img-mm-first" src="../view/img/img.jpg">
                <div class="text-mm-first">
                    <b class="title-mm-first">Hạt cà phê - Khởi nguồn của đam mê</b>
                    <p class="cnt-mm-first">Chúng tôi bắt đầu từ những hạt cà phê nguyên chất, được tuyển chọn kỹ lưỡng từ những vùng đất trù phú nhất. Qua quá trình chế biến công phu và tỉ mỉ, những hạt cà phê ấy trở thành những ly cà phê thơm ngon và đậm đà, mang đến cho bạn những khoảnh khắc thưởng thức tuyệt vời. Không chỉ đơn thuần là hương vị của cà phê, mà đó còn là niềm đam mê chúng tôi dồn vào từng sản phẩm hoàn hảo. Hãy cùng chúng tôi khám phá hành trình từ hạt cà phê đến ly cà phê, và cùng chia sẻ niềm đam mê với chúng tôi. Chúng tôi tin rằng, mỗi giọt cà phê sẽ mang lại cho bạn niềm vui và sự hài lòng.</p>
                </div>
            </div>

            <div class="containt-last">
                <div class="text-mm-last">
                    <b class="title-mm-last">Đội ngũ nhân viên tận tâm và nhiệt huyết</b>
                    <p class="cnt-mm-last">Tại Coffee Monster, chúng tôi luôn tự hào về đội ngũ nhân viên nhiệt tình và tận tâm của mình. Nhân viên của chúng tôi không chỉ đơn thuần là những người pha chế cà phê mà còn là những người mang trong mình tình yêu và niềm đam mê mãnh liệt với cà phê. Chúng tôi luôn sẵn sàng chia sẻ niềm đam mê này với khách hàng, từ khâu chọn lựa hạt cà phê nguyên chất cho đến quy trình chế biến tỉ mỉ để tạo ra những ly cà phê tuyệt hảo. Nhân viên tại Coffee Monster không chỉ đem đến cho khách hàng những sản phẩm chất lượng cao mà còn mang đến những trải nghiệm thú vị khi thưởng thức cà phê. Chúng tôi luôn cố gắng không ngừng để khách hàng có thể cảm nhận được tình yêu và niềm đam mê dành cho cà phê qua mỗi ly cà phê mà chúng tôi phục vụ. Với tinh thần nhiệt huyết và tận tâm, đội ngũ nhân viên của Coffee Monster đã góp phần xây dựng nên một thương hiệu cà phê độc đáo và đáng nhớ. Chúng tôi luôn mong muốn chia sẻ với khách hàng hành trình từ hạt cà phê đến tách cà phê, và cùng họ trải nghiệm niềm đam mê chung với cà phê.</p>
                </div>
                <img class="img-mm-last" src="../view/img/nhansu.jpg">
            </div>

            <div class="contain-us-all">
                
                <div class="ct-ctan-us">
                    <div class="box-ct-dr">
                        <div class="address">
                            <div class="tt-dre">
                                <i class='bx bxs-map'></i>
                                <h1>LIÊN HỆ VỚI CHÚNG TÔI</h1>
                            </div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.294683886133!2d106.61638579999999!3d10.865176600000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a10b0f0554f%3A0x769800e8967d6703!2zNzAgxJAuIFTDtCBLw70sIFTDom4gQ2jDoW5oIEhp4buHcCwgUXXhuq1uIDEyLCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1722309529551!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <hr>
                            <div class="in-ct"><i class='bx bxs-phone-call'></i><b>0354464053</b></div>
                            <hr>
                            <div class="in-ct"><a href="mailto:dcao9049@gmail.com"><i class='bx bxs-envelope' ></i></a><b>dcao9049@gmail.com</b></div>
                            <hr>
                            <div class="in-ct">
                                | <a href="https://www.facebook.com/profile.html?id=100070397753672&mibextid=ZbWKwL" target="_blank"><i class='bx bxl-facebook-circle'></i></a> |
                                <a href="https://www.instagram.com/trunganhlt?igsh=MWR4azFjcWMzZ2g2dg==" target="_blank"><i class='bx bxl-instagram-alt'></i></a> |
                                <a href="https://www.tiktok.com/@quc.trung7365?_t=8nzILavzXsI&_r=1" target="_blank"><i class='bx bxl-tiktok'></i></a> |
                            </div>
                        </div>
                    </div>            
                    <div class="box-ct-dr">
                        <div class="all-contain-us">
                            <div class="contain-us">
                                <div class="tt-dre">
                                    <i class='bx bxs-book-content' ></i>
                                    <h1>NHẬN XÉT PHẢN HỒI</h1>
                                </div>
                                <form class="from-contain">
                                    <div class="input-name-ct">
                                        <p class="name-ipct">Tên:</p>
                                        <input class="input-id" type="text" placeholder="Nhập tên" autocomplete="tel" name="id" aria-invalid="false" >
                                    </div>
                                    <div class="ip-ct-dr">
                                        <p class="tt-ipct-dr">Địa chỉ liên lạc:</p>
                                        <input class="input-id" type="text" placeholder="Nhập email/ Số điện thoại" autocomplete="tel" name="id" aria-invalid="false" >
                                    </div>
                                    <div class="ip-notes-ct">
                                        <p class="tt-ct-notes">Ý kiến phản hồi:</p>
                                        <textarea class="input-id" id="notes" placeholder="Nhập ý kiến" autocomplete="tel" name="id" aria-invalid="false" ></textarea> 
                                    </div>
                                    <hr>
                                    <button class="creat" type="submit" >Gửi</button>
                                </form>
                            </div>
                            <div class="image-ct">
                                <img src="../view/img/gioithieu03.jpg" alt="image main">
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript" src="../view/js/product.js"></script>