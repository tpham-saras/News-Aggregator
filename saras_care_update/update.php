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
          include "./controller/news_controller.php";
          $d = strtotime("-2 weeks");
          $date = date("Y-m-d", $d);
          $url = "https://newsapi.org/v2/everything?q=female%20foeticide&sortBy=publishedAt&from=" . $date . "&apiKey=940595c3bdf849ca8ae32ceed8f5e048";
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

          $data = curl_exec($ch);
          curl_close($ch);
          $articles = json_decode($data)->articles;
          foreach($articles as $article){
            insert_news_data($article->author, $article->title, $article->description, $article->url, $article->urlToImage, $article->publishedAt, $article->content);
            
          }
        ?>
        
        <div id='popup'>
          <button id='btClose' onclick='closePopup()'>X</button><br>
            <iframe id='iframe' class='frame' name='iframe_a' src=''>
              <p>Your browser does not support iframes.</p>
            </iframe>
        </div>
        <?php for($i = 0; $i < count($articles); $i++){ ?>
          <div class='new-frame'>
              <a href='<?php echo $articles[$i]->url ?>' target='iframe_a' onclick='openPopup()'>
                <div class='new-featured-image'>
                  <img src='<?php echo $articles[$i]->urlToImage ?>' alt=' '/>                    </div>
                <div class='new-title'>
                  <?php echo $articles[$i]->title ?>
                </div>
              </a>
          </div>
        <?php } ?>
      </div>
    </body>
</html>
