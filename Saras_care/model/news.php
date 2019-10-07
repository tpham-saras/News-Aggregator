<?php
    class News{
        private $author;
        private $title;
        private $descriptions;
        private $url;
        private $urlToImage;
        private $publishedAt;
        private $content;
        public function __construct($author, $title, $descriptions, $url, $urlToImage, $publishedAt, $content){
            $this->author = $author;
            $this->title = $title;
            $this->descriptions = $descriptions;
            $this->url = $url;
            $this->urlToImage = $urlToImage;
            $this->publishedAt = $publishedAt;
            $this->content = $content;
        }
        public function getAuthor(){
            return $this->author;
        }
        public function setAuthor($author){
            $this->author = $author;
        }
        public function getTitle(){
            return $this->title;
        }
        public function setTitle($title){
            $this->author = $author;
        }   
        public function getDescriptions(){
            return $this->descriptions;
        }
        public function setDescription($descriptions){
            $this->descriptions = $descriptions;
        }
        public function getUrl(){
            return $this->url;
        }
        public function setUrl($url){
            $this->url = $url;
        }
        public function getUrlToImage(){
            return $this->url;
        }
        public function setUrlToImage($urlToImage){
            $this->url;
        }
        public function getPublishedAt(){
            return $this->publishedAt;
        }
        public function setPublishedAt($publishedAt){
            $this->publishedAt = $publishedAt;
        }
        public function getContent(){
            return $this->content;
        }
        public function setContent($content){
            $this->content = $content;
        }
    }
?>