<?php
    function db_insert($author, $title, $description, $url, $urlToImage, $publishedAt, $content){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = null;
        try{
            $conn = new PDO("mysql:host=$servername;dbname=saras_care", $username, $password);
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
            echo "New record created successfully" . "<br/>";
        } catch(PDOException $e){
            echo "connection failed: " . $e->getMessage() . "<br/>";
        }
        $conn = null;
    }

    $author = "Yashu Gola";
    $title = "Showing Off Bitcoin Holdings Can Get You Killed";
    $descriptions = "Makeva Jones was homeless before she transformed her life and secured a six-figure job. The Florida resident bragged about her rags-to-riches story on Facebook, only to find a masked man at her doorsteps three hours later. The thug shot her dead. Jones' shock…";
    $url = 'https://www.ccn.com/showing-off-bitcoin-can-get-you-killed/';
    $urlToImage = 'https://www.ccn.com/wp-content/uploads/2019/09/Bitcoin-wallet.jpg';
    $publishedAt = "2019-09-09T22:30:17Z";
    $content = "Makeva Jones was homeless before she transformed her life and secured a six-figure job. The Florida resident bragged about her rags-to-riches story on Facebook, only to find a masked man at her doorsteps three hours later. The thug shot her dead.\r\nJones' shoc… [+3067 chars]";

    db_insert($author, $title, $descriptions, $url, $urlToImage, $publishedAt, $content);
?>