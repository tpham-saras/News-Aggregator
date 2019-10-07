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
            if(strpos($link, "https://news.google.com") === 0){
                return gg_news_org($link);
            }
            return $link;
        }else{
            if(preg_match('/<noscript>Opening <a href="([^"]+")/', $result, $match)){
                return $match[1];
            }
        }
        return '';
    }
     
    // $dom = new DomDocument();
    // libxml_use_internal_errors(true);
    // $dom->loadHTMLFile("https://news.google.com/search?q=female%20feticide&hl=en-AU&gl=AU&ceid=AU%3Aen");
    // $xpath = new DOMXPath($dom);
    // $idx = 0;
    // $articles = [];
    // foreach ($xpath->query('//div[contains(@class,"NiLAwe y6IFtc R7GTQ keNKEd j7vNaf nID9nc")]') as $item){
    //     $idx ++;
    //     if($idx > 5) break;
    //     $article = [
    //         'i' => '',
    //         'o' => ''
    //     ];
    //     foreach($xpath->query('.//img[contains(@class,"tvs3Id QwxBBf")]', $item) as $img){
    //         $article['i'] = $img->getAttribute('src');      
    //         break;
    //     }
       
    //     foreach($xpath->query('.//a[contains(@class,"DY5T1d")]', $item) as $a){
    //         $link = $a->getAttribute('href');
    //         if($link){
    //             $article['o'] = gg_news_org(str_replace('./', "https://news.google.com/", $link));
    //         }
    //         break;
    //     }
    //     $articles[] = $article;
    // }
    // var_dump($articles);
    
    
?>