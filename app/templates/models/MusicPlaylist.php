<?php

final class MusicPlaylist {

    private $songs = [];


    public static function Instance(){
        static $inst = null;
        if($inst === null){
            $inst = new MusicPlaylist();
        }

        $this->fill();

        return $inst;
    }

    private function __construct(){
    }

    public function getSongs(){
        return $this->Songs;
    }

    private function fill(){
        include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials

        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance
 
        if($connection){
            $query = $connection->query("select * from songs");

            while($row = $query->fetch_array()){
                $song = new Song($row['sid'], $row['title'],$row['duration'],$row['path']); //songs

                array_push($this->songs, $song);
            }
        }else{
            echo "Cannot Retrieve Archive";
        }

        $db->closeConnection();
    }
}