<html>
    <head>
        <title>Saras Care</title>
        <link rel="stylesheet" type="text/css" href="resources/css/popup.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mystyle.css">
        <!-- <link rel="stylesheet" type="text/css" href="resources/css/style.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="resources/js/popup.js"></script>
    </head>
    <body>
      <div class="news-frame">
        <?php
            require("controller/news_controller.php");
            $limit = 5;
            if(isset($_GET["page"])){
                $pn = $_GET["page"];
            } else{
                $pn = 1;
            }
            $start_from = ($pn - 1) * $limit;
            $articles = load_news_data();
            $limitArticles = load_limit_news_data($start_from, $limit);
            $total_pages = ceil(count($articles)/$limit);
            $pagLink = "";
        ?>
        <div id='popup'>
            <button id='btClose' onclick='closePopup()'>  X  </button><br>
            
            <iframe id='iframe' class='frame' name='iframe_a' src=''>
                <p>Your browser does not support iframes.</p>
            </iframe>
        </div>
        
        <?php 
        foreach($limitArticles as $article){?>
        <div class='new-frame'>
            <a href='<?php echo $article['url'] ?>' target='iframe_a' onclick='openPopup()'>
                <div class='new-featured-image'>
                    <img src='<?php echo $article['urlToImage'] ?>' alt=' '/>                    
                </div>
                <div class='new-title'>
                    <?php echo $article['title'] ?>
                </div>
            </a>
        </div>
        <?php } ?>
        <br/>
        <div class="navigation">
        <ul class="pagination">
        <?php
            for ($i=1; $i<=$total_pages; $i++) { 
                if ($i==$pn) { 
                    $pagLink .= "<li class='active'><a href='index.php?page="
                                                      .$i."'>".$i."</a></li>"; 
                }             
                else  { 
                    $pagLink .= "<li><a href='index.php?page=".$i."'> 
                                                      ".$i."</a></li>";   
                } 
              };   
              echo $pagLink; 
        ?>
        </ul>
        </div>
        
        </div>
        
    </body>
</html>