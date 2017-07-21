<?php

include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/models/Song.php';

final class MusicPlaylist {

    private $songs = [];


    public static function Instance(){
        static $inst = null;
        if($inst === null){
            $inst = new MusicPlaylist();
        }

        $inst->fill();

        return $inst;
    }

    private function __construct(){
    }

    public function getSongs(){
        return $this->songs;
    }

    private function fill(){
        
        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance
 
        if($connection){
            $query = $connection->query("select * from songs");

            while($row = $query->fetch_array()){
                $song = new Song($row['sid'], $row['title'],$row['duration'], $row['year'], $row['path']); //songs

                array_push($this->songs, $song);
            }
        }else{
            echo "Cannot Retrieve Archive";
        }

        $db->closeConnection();
    }
}