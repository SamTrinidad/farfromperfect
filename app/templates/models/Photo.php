<?php

class Photo {
    private $pid;
    private $description;
    private $date;
    private $path;
    private $person;

    public function __construct($pid, $description, $date, $path, $person){
        $this->pid = $pid;
        $this->description = $description;
        $this->date = $date;
        $this->path = $path;
        $this->person = $person;
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