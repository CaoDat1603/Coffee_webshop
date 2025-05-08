<?php
include "connect.php";
include "../controller/function.php";

$order_id = $_GET['this_id'];
$STT = 1;

echo "<main>";
echo "<div class='form-edit'>";
echo "<button onclick=\"location.href='../controller/index.php?act=manage-orders'\">Trở về</button>";
echo "<hr>";
echo "<div style='display: flex; justify-content: center; flex-direction: column; align-items: center;'>";
echo "<h1>Cập nhật trạng thái đơn hàng</h1>";
echo "<p><strong>Mã đơn hàng:</strong> " . $order_id . "</p>";
echo "<p><strong>Tên khách hàng:</strong> " . getUserInfor(getOrderInfor($order_id, 'user_id'), 'user_name') . "</p>";
echo "<p><strong>Thời gian đặt hàng:</strong> " . getOrderInfor($order_id, 'order_time') . "</p>";
?>
<link rel="stylesheet" href="../view/css/update_order.css">
<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên món</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
        </tr>
    </thead>
    <tbody id="order-list">  
        <?php foreach (getOrderDetail($order_id) as $row_order_detail){?>
            <tr>
                <td><?php echo $STT++ ?></td>
                <td><?php echo $row_order_detail['product_name']; ?></td>
                <td><?php echo $row_order_detail['quantity']; ?></td>
                <td><?php echo $row_order_detail['price'].'đ'; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
echo "<p><strong>Tổng tiền:</strong> $" . getOrderInfor($order_id, 'total_payment').'đ' . "</p>";
echo "<p><strong>Phương thức thanh toán:</strong> " . "Thanh toán khi nhận hàng" . "</p>";
echo "<p><strong>Địa chỉ giao hàng:</strong> " . getOrderInfor($order_id, 'order_address')  . "</p>";
?>

<div id="notification-popup">
    <div class="notification-content" style="width: 30%; height: 30%;">
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
    }

<?php
if (isset($_POST['bnt'])) {
    $status = $_POST['status'];

    $update_sql = "UPDATE `order` SET Status = '$status' WHERE order_id = '$order_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "showNotification('Cập nhật thông tin đơn hàng thành công!! (:');";
    } else {
        echo "showNotification('Lỗi khi cập nhật thông tin: " . mysqli_error($conn) . "!! ):');";
    }
}

// Lấy thông tin hiện tại của đơn hàng để hiển thị trên form
$order_info = [
    'status' => getOrderInfor($order_id, 'Status')
];

$conn->close();
?>
</script>