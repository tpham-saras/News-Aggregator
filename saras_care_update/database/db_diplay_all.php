<?php 
    // function 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "saras_care";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT author, title, descriptions, url, urlToImage, publishedAt, content FROM news");
        $stmt->execute();
        
        $result = $stmt->fetchAll();
        foreach($result as $news){
            echo $news['author'] . "<br/>";
            echo $news['title'] . "<br/>";
            echo $news['descriptions'] . "<br/>";
            echo $news['url'] . "<br/>";
            echo $news['urlToImage'] . "<br/>";
            echo $news['publishedAt'] . "<br/>";
            echo $news['content'] . "<br/>";
            echo "----------------------" . "<br/>";
        }
        
    }catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>