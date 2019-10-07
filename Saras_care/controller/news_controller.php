<?php
    require("console_log.php");
    
    
    function load_news_data(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "saras_care";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT author, title, descriptions, url, urlToImage, publishedAt, content FROM news_v2");
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch(PDOException $e){
            console_log("Error: " . $e->getMessage());
        }
        $conn = null;
        return $result;
    }

    function insert_news_data($author, $title, $descriptions, $url, $urlToImage, $publishedAt, $content){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "saras_care";
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO news_v2 (author, title, descriptions, url, urlToImage, publishedAt, content)
                    VALUES (
                        :author,
                        :title,
                        :descriptions,
                        :url,
                        :urlToImage,
                        :publishedAt,
                        :content
                    )
            ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':descriptions', $descriptions);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':urlToImage', $urlToImage);
            $stmt->bindParam(':publishedAt', $publishedAt);
            $stmt->bindParam(':content', $content);

            $stmt->execute();
            console_log("New record created successfully");
            // echo "New record created successfully" . "<br/>";
        } catch(PDOException $e){
            console_log("connection failed: " . $e->getMessage());
            // echo "connection failed: " . $e->getMessage() . "<br/>";
            return false;
        }
        $conn = null;
        return true;
    }
?>