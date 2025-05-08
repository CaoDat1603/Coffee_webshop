<?php 
    include "connect.php"; 
    
    $category_map = [
        1 => 'Caffee',
        2 => 'Trà',
        3 => 'Bánh'
    ];


    $sql = "SELECT * FROM product WHERE 1=1";


    if (isset($_GET['category_filter']) && $_GET['category_filter'] != '') {
        $category_filter = $_GET['category_filter'];
        // $sql .= " AND ca_id = '$category_filter'";
    }

    if(isset($_POST['search']) && $_POST['content'] != ''){
        $content = $_POST['content'];
        // $sql .= " AND product_name LIKE '%$content%'";
    }


    if (isset($content)) {
        $sql .= " AND product_name LIKE '%$content%'";
    }
    if (isset($category_filter)) {
        $sql .= " AND ca_id = '$category_filter'";
    }
    $sql .= " ORDER BY product_id";

    $products = mysqli_query($conn, $sql);
    mysqli_close($conn);

    foreach ($products as $row) {
?>
        <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['price']; ?>đ</td>
            <td><img width="50" height="50" src="../view/img/product/<?php echo $row['img']; ?>" alt="<?php echo $row['product_name']; ?>"></td>
            <td><?php echo $category_map[$row['ca_id']]; ?></td> 
            <td>
            <button onclick="location.href='index.php?act=edit_product&this_id=<?php echo $row['product_id']; ?>'">Sửa</button>
            <?php
            if ($row['status'] == 'active') {?>
                <button onclick="showElementById('backround-hidden-buttons_id<?php echo $row['product_id']; ?>')">Ẩn</button>
            <?php } else { ?>
                <button onclick="showElementById('backround-display-buttons_id<?php echo $row['product_id']; ?>')">Hiện</button>
            <?php }?>
            </td>
        </tr>

        <div class="bkrdbtt" id="backround-display-buttons_id<?php echo $row['product_id']; ?>">
            <div class="form-yes" style="width: 30%; height: 30%;">
                <h2 style="justify-content: center; display: flex; height: 55%;">Bạn có chắc chắn Xác nhận sửa đổi không.</h2>
                <div class="form-buttons">
                    <button class="yesbtnow" id="br" onclick="location.href='../controller/show_product.php?this_id=<?php echo $row['product_id']; ?>'">Xác nhận</button>
                    <button class="nobtnow" id ="br" type="button" onclick="hideElementById('backround-display-buttons_id<?php echo $row['product_id']; ?>')">Hủy</button>
                </div>
            </div>
        </div>

        <div class="bkrdbtt" id="backround-hidden-buttons_id<?php echo $row['product_id']; ?>">
            <div class="form-yes" style="width: 30%; height: 30%;">
                <h2 style="justify-content: center; display: flex; height: 55%;">Bạn có chắc chắn Xác nhận sửa đổi không.</h2>
                <div class="form-buttons">
                    <button class="yesbtnow" id="br" onclick="location.href='../controller/hide_product.php?this_id=<?php echo $row['product_id']; ?>'">Xác nhận</button>
                    <button class="nobtnow" id ="br" type="button" onclick="hideElementById('backround-hidden-buttons_id<?php echo $row['product_id']; ?>')">Hủy</button>
                </div>
            </div>
        </div>
<?php }
?>

