<?php
include "connect.php";

$sql = "INSERT INTO categoryproduct(ca_id, ca_name)
VALUES 
        ('', 'Caffee'),
        ('', 'Trà'),
        ('', 'Bánh')";

mysqli_query($conn, $sql);
$conn->close();
?>