<?php

class BlogPost {

    private $pid;
    private $date;
    private $title;
    private $text;
    private $comments = array();
    private $thumbs;

    public function __construct($pid, $date, $title, $text){
        $this->pid= $pid;
        $this->date = $date;
        $this->title = $title;
        $this->text = $text;
        // $this->comments = $comments;
        // $this->thumbs = $thumbs;

        $this->fillComments();
    }

    public function setPid($pid){
        $this->pid = $pid;
    }

    public function getPid(){
        return $this->pid;
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

    private function fillComments(){

    }

    public function getComments(){
        return $this->comments;
    }

    public function getThumbs(){
        return $this->thumbs;
    }
}