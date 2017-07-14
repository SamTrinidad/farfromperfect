<?php

class Song {
    private $sid;
    private $title;
    private $duration;
    private $path;

    public function __construct($sid, $title, $duration, $path){
        $this->sid = $sid;
        $this->title = $title;
        $this->duration = $duration;
        $this->path = $path;
    }

    public function getId(){
        return $this->sid;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDuration(){
        return $this->duration;
    }

    public function getPath(){
        return $this->path;
    }
}