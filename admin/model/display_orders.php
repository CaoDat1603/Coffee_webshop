

<?php 
    include "connect.php"; 

    $status_filter = isset($_GET['status']) ? $_GET['status'] : 'all';

    $search_order_id = "";
    $search_phone = "";
    if(isset($_POST['search_id_btn'])){
        $search_order_id = isset($_POST['search_order_id']) ? $_POST['search_order_id'] : '';
    }

    if(isset($_POST['search_phone_btn'])){
        $search_phone = isset($_POST['search_phone']) ? $_POST['search_phone'] : '';
    }
    
    $sql = "SELECT o.* FROM `order` o 
            JOIN `user` u ON o.user_id = u.user_id 
            WHERE 1=1";

    
    if (!empty($search_order_id)) {
        $sql .= " AND o.order_id = '$search_order_id'";
    }


    if (!empty($search_phone)) {
        $sql .= " AND u.phone_number LIKE '%$search_phone%'";
    }

    
    if ($status_filter !== 'all') {
        $sql .= " AND o.Status = '$status_filter'";
    }

    $sql .= " ORDER BY o.order_time ASC";

    
    $orders = mysqli_query($conn, $sql);
?>

<h3>Danh sách đơn hàng</h3>
<table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Quantity</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th>Total Money</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="order-list">  
        <?php foreach ($orders as $row): ?>
            <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td>
                    <?php foreach (getOrderDetail($row['order_id']) as $row_order_detail): ?>
                        <?php echo $row_order_detail['product_name'] . " (" . "x" . $row_order_detail['quantity'] . ")" ."<br>"; ?>
                    <?php endforeach; ?>
                </td>
                <td><?php echo getUserInfor($row['user_id'], 'user_name'); ?></td>
                <td><?php echo $row['order_time']; ?></td>
                <td><?php echo $row['total_payment']; ?>đ</td>
                <td><?php echo $row['Status']; ?></td>
                <td>
                    <button onclick="location.href='index.php?act=view_order_detail&this_id=<?php echo $row['order_id']; ?>'">Xem chi tiết</button>
                    <br>
                    <button onclick="location.href='index.php?act=update_order&this_id=<?php echo $row['order_id']; ?>'">Cập nhật trạng thái</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
