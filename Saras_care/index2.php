<html>
    <head>
        <title>Saras Care</title>
        <link rel="stylesheet" type="text/css" href="resources/css/popup.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mystyle.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <script src="resources/js/popup.js"></script>
    </head>
    <body>
      <div class="news-frame">
        <?php
            require("controller/news_controller.php");
            $articles = load_news_data();
        ?>
        <div id='popup'>
            <button id='btClose' onclick='closePopup()'>X</button><br>
            <iframe id='iframe' class='frame' name='iframe_a' src=''>
                <p>Your browser does not support iframes.</p>
            </iframe>
        </div>
        <?php 
        foreach($articles as $article){?>
        <div class='new-frame'>
            <a href='<?php echo $article['url'] ?>' target='iframe_a' onclick='openPopup()'>
                <div class='new-featured-image'>
                <img src='<?php echo $article['urlToImage'] ?>' alt=' '/>                    </div>
                <div class='new-title'>
                    <?php echo $article['title'] ?>
                </div>
            </a>
        </div>
        <?php } ?>
    </body>
</html>