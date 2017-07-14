<?php

final class MusicPlaylist {

    private $Songs = [];


    public static function Instance(){
        static $inst = null;
        if($inst === null){
            $inst = new MusicPlaylist();
        }
        return $inst;
    }

    private function __construct(){
    }


}