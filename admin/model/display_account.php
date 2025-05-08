<?php 
    include "connect.php"; 

    $category_map = [
        0 => 'Admin',
        1 => 'Customer'
    ];

    // Bắt đầu với câu truy vấn cơ bản
    $sql = "SELECT * FROM user WHERE 1=1";

    // Xử lý bộ lọc từ GET
    if (isset($_GET['category_filter']) && $_GET['category_filter'] != '') {
        $category_filter = $_GET['category_filter'];
        $sql .= " AND level = '$category_filter'";
    }

    // Xử lý tìm kiếm từ POST
    if (isset($_POST['search']) && $_POST['content'] != '') {
        $content = $_POST['content'];
        $sql .= " AND phone_number LIKE '%$content%'";
    }

    $sql .= " ORDER BY user_id";

    $users = mysqli_query($conn, $sql);
    mysqli_close($conn);

    foreach ($users as $row) {
?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['phone_number']; ?></td>
            <td><?php echo $category_map[$row['level']]; ?></td> 
        </tr>
<?php }
?>
