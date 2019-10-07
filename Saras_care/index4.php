<html>
    <head>
        
    </head>
    <body>
        <div class="news-frame">
            <?php
            include './lib/simplehtmldom_1_9/simple_html_dom.php';
            $html = file_get_html('https://www.independent.co.uk/environment/uk-wildlife-species-extinct-state-nature-report-a9138276.html');

            // Find all images
            foreach($html->find('article') as $article){
                echo $article;
                break;
            }
                

            ?>
        </div>
    </body>
</html>


