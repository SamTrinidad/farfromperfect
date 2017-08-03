<?php

class Photo {
    private $pid;
    private $description;
    private $date;
    private $path;


    public function __construct($pid, $description, $date, $path){
        $this->pid = $pid;
        $this->description = $description;
        $this->date = $date;
        $this->path = $path;
    }

    public function getId(){
        return $this->pid;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDate(){
        return $this->date;
    }

    public function getPath(){
        return $this->path;
    }
}