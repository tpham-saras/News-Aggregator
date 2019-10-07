<html>
    <head>
        <title>Saras Care</title>
        <link rel="stylesheet" type="text/css" href="resources/css/popup.css">
        <link rel="stylesheet" type="text/css" href="resources/css/mystyle.css">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <script src="./resources/js/popup.js"></script>
    </head>
    <body>
        <div class="news-frame">
            <?php
                function console($data) {
                    $output = $data;
                    if (is_array($output))
                        $output = implode(',', $output);
                    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
                }
            ?>
            
            <?php
                include './curl-process.php';
                require('./lib/simplehtmldom_1_9/simple_html_dom.php');
                $url = "https://news.google.com/search?q=female%20feticide&hl=en-AU&gl=AU&ceid=AU%3Aen";
                $html = file_get_html($url);
                $length = 0;
                $limit = 0;
                $urls = [];
                $images = [];
                $anchors = [];
                $text;
                foreach($html->find("div[class='NiLAwe y6IFtc R7GTQ keNKEd j7vNaf nID9nc']") as $div){
                    if($length >= 10){
                        break;
                    }
                    $length++;
                    foreach($div->find("img[class='tvs3Id QwxBBf']") as $img){
                        array_push($images, $img->src);
                        break;
                    }

                    foreach($div->find("a[class='DY5T1d']") as $a){
                        $a->href = str_replace("./", "https://news.google.com/", $a->href);
                        array_push($anchors, $a);
                        break;
                    }
                }
                for($i = 0; $i < $length; $i++){
                    $text = str_replace("./", "https://news.google.com/", $anchors[$i]->href);
                    $text = trim($text);
                    array_push($urls, substr_replace(gg_news_org($text) ,"", -1));
                } ?>
                <div id='popup'>
                        <button id='btClose' onclick='closePopup()'>X</button><br>
                        <iframe id='iframe' class='frame' name='iframe_a' src=''>
                            <p>Your browser does not support iframes.</p>
                        </iframe>
                </div>;
                <?php for($i = 0; $i < $length; $i++){ ?>
                        <div class='new-frame'>
                            <a href='<?php echo $urls[$i] ?>' target='iframe_a' onclick='openPopup()'>
                                <div class='new-featured-image'>
                                    <img src='<?php echo $images[$i] ?>' alt=' '/>
                                </div>
                                <div class='new-title'>
                                    <?php echo $anchors[$i] ?>
                                </div>
                            </a>
                        </div>;
                <?php } ?>
        </div>
    </body>
</html>


