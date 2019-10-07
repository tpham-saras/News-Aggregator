<?php
    // include 'db_connect.php';
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=saras_care", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    
        $sql = "CREATE TABLE news_v2 (
            -- id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            author VARCHAR(30),
            title VARCHAR(100) NOT NULL,
            descriptions VARCHAR(200),
            url VARCHAR(100) PRIMARY KEY,
            urlToImage VARCHAR(100) NOT NULL,
            publishedAt VARCHAR(100),
            content VARCHAR(200)
        )";
        $conn->exec($sql);
        echo "Create successful!";
    } catch(PDOException $e){
        echo "connection failed: " . $e->getMessage();
    }
    $conn = null;
?>