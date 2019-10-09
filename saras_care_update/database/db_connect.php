<?php
    $servername = "35.244.104.181";
    $username = "root";
    $password = "abc123";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=saras_care", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e){
        echo "connection failed: " . $e->getMessage();
    }
    $conn = null;
?>