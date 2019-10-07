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
                function gg_news_org($url){
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_HEADER, true);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                    $result = curl_exec($ch);
                    curl_close($ch);
                   
                    if(preg_match('#(?:Location|URI): (.*)#', $result, $r)){
                        $link = trim($r[1]);
                        return $link;
                    }else{
                        if(preg_match('/<noscript>Opening <a href="([^"]+")/', $result, $match)){
                            return $match[1];
                        }
                    }
                    return '';
                }
                 
                $dom = new DomDocument();
                libxml_use_internal_errors(true);
                // https://news.google.com/search?q=female%20feticide&hl=en-AU&gl=AU&ceid=AU%3Aen
                $dom->loadHTMLFile("https://news.google.com/search?q=female%20feticide&hl=en-AU&gl=AU&ceid=AU%3Aen");
                $xpath = new DOMXPath($dom);
                $idx = 0;
                $articles = [];
                foreach ($xpath->query('//div[contains(@class,"NiLAwe y6IFtc R7GTQ keNKEd j7vNaf nID9nc")]') as $item){
                    $idx ++;
                    if($idx > 5) break;
                    $article = [
                        'i' => '',
                        't' => '',
                        'o' => ''
                    ];
                    foreach($xpath->query('.//img[contains(@class,"tvs3Id QwxBBf")]', $item) as $img){
                        $article['i'] = $img->getAttribute('src');      
                        break;
                    }


                    foreach($xpath->query('.//a[contains(@class,"DY5T1d")]', $item) as $a){
                        $link = $a->getAttribute('href');
                        if($link){
                            $article['t'] = $a->nodeValue;
                            $article['o'] = substr_replace(gg_news_org(str_replace('./', "https://news.google.com/", $link)) ,"", -1);
                        }
                        break;
                    }
                    $dom_url = 
                    $articles[] = $article;
                }
                // var_dump($articles);
            ?>
            <div id='popup'>
                <button id='btClose' onclick='closePopup()'>X</button><br>
                <iframe id='iframe' class='frame' name='iframe_a' src=''>
                    <p>Your browser does not support iframes.</p>
                </iframe>
            </div>;
            <?php for($i = 0; $i < count($articles); $i++){ ?>
                <div class='new-frame'>
                    <a href='<?php echo $articles[$i]['o'] ?>' target='iframe_a' onclick='openPopup()'>
                        <div class='new-featured-image'>
                            <img src='<?php echo $articles[$i]['i'] ?>' alt=' '/>
                        </div>
                        <div class='new-title'>
                            <?php echo $articles[$i]['t'] ?>
                        </div>
                    </a>
                </div>;
            <?php } ?>
        </div>
    </body>
</html>