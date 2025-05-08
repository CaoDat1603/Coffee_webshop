<?php 
    include "connect.php";
    // SQL để tạo bảng Announcement
    $sql = "CREATE TABLE Announcement (
        an_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        an_content TEXT NOT NULL,
        an_time DATETIME NOT NULL,
        an_title VARCHAR(255) NOT NULL,
        created_by INT(11) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table Announcement created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
    // SQL để tạo bảng User
    $sql = "CREATE TABLE User (
        user_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(255) NOT NULL,
        user_pass VARCHAR(255) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        level INT(11) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table User created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
    // SQL để tạo bảng UserAnnouncement
    $sql = "CREATE TABLE UserAnnouncement (
        user_id INT(11) NOT NULL,
        an_id INT(11) NOT NULL,
        PRIMARY KEY (user_id, an_id),
        FOREIGN KEY (user_id) REFERENCES User(user_id),
        FOREIGN KEY (an_id) REFERENCES Announcement(an_id)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table UserAnnouncement created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
     // SQL để tạo bảng CategoryProduct
     $sql = "CREATE TABLE CategoryProduct (
        ca_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        ca_name VARCHAR(255) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table CategoryProduct created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // SQL để tạo bảng Product
    $sql = "CREATE TABLE Product (
        product_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        ca_id INT(11) NOT NULL,
        product_name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        img VARCHAR(255),
        FOREIGN KEY (ca_id) REFERENCES CategoryProduct(ca_id)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table Product created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    // SQL để tạo bảng Promotion
    $sql = "CREATE TABLE Promotion (
        pro_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        pro_title VARCHAR(255) NOT NULL,
        pro_content TEXT NOT NULL,
        pro_create_time DATETIME NOT NULL,
        created_by INT(11) NOT NULL,
        discount_amount DECIMAL(10, 2) NOT NULL,
        start_date DATETIME NOT NULL,
        end_date DATETIME NOT NULL,
        pro_code VARCHAR(255),
        quantity INT(11) NOT NULL,
        img VARCHAR(255)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table Promotion created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
    // SQL để tạo bảng Order
    $sql = "CREATE TABLE `Order` (
        order_id INT(11) AUTO_INCREMENT PRIMARY KEY,
        total_payment DECIMAL(10, 2) NOT NULL,
        order_time DATETIME NOT NULL,
        pro_id INT(11),
        Status VARCHAR(255) NOT NULL,
        user_id INT(11) NOT NULL,
        FOREIGN KEY (pro_id) REFERENCES Promotion(pro_id),
        FOREIGN KEY (user_id) REFERENCES User(user_id)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table Order created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    
    // SQL để tạo bảng OrderDetail
    $sql = "CREATE TABLE OrderDetail (
        order_id INT(11) NOT NULL,
        product_id INT(11) NOT NULL,
        quantity INT(11) NOT NULL,
        PRIMARY KEY (order_id, product_id),
        FOREIGN KEY (order_id) REFERENCES `Order`(order_id),
        FOREIGN KEY (product_id) REFERENCES Product(product_id)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table OrderDetail created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
    // Đóng kết nối
    $conn->close();
    ?>
?>