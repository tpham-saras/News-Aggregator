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
        
      </div>
    </body>
</html>
