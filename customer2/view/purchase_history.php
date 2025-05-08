<?php include "../controller/function.php"; ?>
<?php include "../model/purchase_history.php"; ?>
<link rel="stylesheet" type="text/css" href="../view/css/purchase_history.css">
    <!--main section-->
    <main class="main">
        <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
            <h2>Danh sách đơn hàng đang xử lý</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list">  
                    <?php foreach ($pending_orders as $row): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                                <?php foreach (getOrderDetail($row['order_id']) as $row_order_detail): ?>
                                    <img width="50" height="50" src="../view/img/product/<?php echo $row_order_detail['img']; ?>" alt="<?php echo $row_order_detail['product_name']; ?>">
                                    <?php echo $row_order_detail['product_name'] . " (" . "x" . $row_order_detail['quantity'] . ")"; ?>
                                    <br>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo getUserInfor($row['user_id'], 'user_name'); ?></td>
                            <td><?php echo $row['order_time']; ?></td>
                            <td><?php echo $row['total_payment']; ?>đ</td>
                            <td><?php echo $row['Status']; ?></td>
                            <td>
                                <button onclick="location.href='index.php?act=view_order_detail&this_id=<?php echo $row['order_id']; ?>'">Xem chi tiết</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Danh sách đơn hàng đang vận chuyển</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list">  
                    <?php foreach ($shipping_orders as $row): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                                <?php foreach (getOrderDetail($row['order_id']) as $row_order_detail): ?>
                                    <img width="50" height="50" src="../view/img/product/<?php echo $row_order_detail['img']; ?>" alt="<?php echo $row_order_detail['product_name']; ?>">
                                    <?php echo $row_order_detail['product_name'] . " (" . "x" . $row_order_detail['quantity'] . ")"; ?>
                                    <br>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo getUserInfor($row['user_id'], 'user_name'); ?></td>
                            <td><?php echo $row['order_time']; ?></td>
                            <td><?php echo $row['total_payment']; ?>đ</td>
                            <td><?php echo $row['Status']; ?></td>
                            <td>
                                <button onclick="location.href='index.php?act=view_order_detail&this_id=<?php echo $row['order_id']; ?>'">Xem chi tiết</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Danh sách đơn hàng đã giao thành công</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list">  
                    <?php foreach ($delivered_orders as $row): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                                <?php foreach (getOrderDetail($row['order_id']) as $row_order_detail): ?>
                                    <img width="50" height="50" src="../view/img/product/<?php echo $row_order_detail['img']; ?>" alt="<?php echo $row_order_detail['product_name']; ?>">
                                    <?php echo $row_order_detail['product_name'] . " (" . "x" . $row_order_detail['quantity'] . ")"; ?>
                                    <br>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo getUserInfor($row['user_id'], 'user_name'); ?></td>
                            <td><?php echo $row['order_time']; ?></td>
                            <td><?php echo $row['total_payment']; ?>đ</td>
                            <td><?php echo $row['Status']; ?></td>
                            <td>
                                <button onclick="location.href='index.php?act=view_order_detail&this_id=<?php echo $row['order_id']; ?>'">Xem chi tiết</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Danh sách đơn hàng đã hủy</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Order Date</th>
                        <th>Total Money</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="order-list">  
                    <?php foreach ($cancelled_orders as $row): ?>
                        <tr>
                            <td><?php echo $row['order_id']; ?></td>
                            <td>
                                <?php foreach (getOrderDetail($row['order_id']) as $row_order_detail): ?>
                                    <img width="50" height="50" src="../view/img/product/<?php echo $row_order_detail['img']; ?>" alt="<?php echo $row_order_detail['product_name']; ?>">
                                    <?php echo $row_order_detail['product_name'] . " (" . "x" . $row_order_detail['quantity'] . ")"; ?>
                                    <br>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo getUserInfor($row['user_id'], 'user_name'); ?></td>
                            <td><?php echo $row['order_time']; ?></td>
                            <td><?php echo $row['total_payment']; ?>đ</td>
                            <td><?php echo $row['Status']; ?></td>
                            <td>
                                <button onclick="location.href='index.php?act=view_order_detail&this_id=<?php echo $row['order_id']; ?>'">Xem chi tiết</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php $conn->close(); ?>
        </div>
    </main>
    <!-- <script type="text/javascript" src="../view/js/purchase_history.js"></script> -->
    <script>
        // Save scroll position before navigating away
        window.addEventListener('beforeunload', () => {
            sessionStorage.setItem('scrollPosition', window.scrollY);
        });

        // Restore scroll position when the page loads
        window.addEventListener('DOMContentLoaded', () => {
            const scrollPosition = sessionStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, parseInt(scrollPosition, 10));
                sessionStorage.removeItem('scrollPosition'); // Clean up
            }
        });
    </script>
