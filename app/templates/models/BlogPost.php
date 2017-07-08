<?php

class BlogPost {

    private $date;
    private $title;
    private $text;
    private $comments;
    private $thumbs;

    public function __construct($date, $title, $text, $comments, $thumbs){
        $this->date = $date;
        $this->title = $title;
        $this->text = $text;
        $this->comments = $comments;
        $this->thumbs = $thumbs;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setText($text){
        $this->text = $text;
    }

    public function getText(){
        return $this->text;
    }

    public function getDate(){
        return $this->date;
    }

    public function getComments(){
        return $this->comments;
    }

    public function getThumbs(){
        return $this->thumbs;
    }
}