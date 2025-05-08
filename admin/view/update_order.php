<?php
include "../model/update_order.php";
?>
<form method="post" style="width: 100%;">
    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

    <p style="display: flex; justify-content: center; gap: 10px; align-items: center;">
    <strong><label for="status"><u>Trạng thái đơn hàng:</u></label></strong>
        <select id="status" name="status" style="width: 200px; height: 30px;">
            <option value="Pending" <?php echo $order_info['status'] == 'Pending' ? 'selected' : ''; ?>>Chờ xử lý</option>
            <option value="Shipping" <?php echo $order_info['status'] == 'Shipping' ? 'selected' : ''; ?>>Đang giao hàng</option>
            <option value="Delivered" <?php echo $order_info['status'] == 'Delivered' ? 'selected' : ''; ?>>Đã giao hàng</option>
            <option value="Cancelled" <?php echo $order_info['status'] == 'Cancelled' ? 'selected' : ''; ?>>Đã hủy</option>
        </select>
    </p>
    <hr>
    <p style="display: flex; justify-content: center;">
        <button id="br" onclick="showAddProductForm()">Cập nhập</button>
    </p>
    <div id="backround-form-buttons">
        <div class="form-yes" style="width: 30%; height: 30%;">
            <h2 style="justify-content: center; display: flex; height: 55%;">Bạn có chắc chắn Xác nhận sửa đổi không.</h2>
            <div class="form-buttons">
                <button id="submit br" name="bnt" type="submit" value="Cập Nhật">Xác nhận</button>
                <button id ="br" type="button" name="cancel" onclick="hideAddProductForm()">Hủy</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>

</main>

<script>
function showAddProductForm() {
    document.getElementById('backround-form-buttons').style.display = 'flex';
}

function hideAddProductForm() {
    document.getElementById('backround-form-buttons').style.display = 'none';
}

document.getElementById("br").addEventListener("click", function(event) {
    event.preventDefault();
})
</script>