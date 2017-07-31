<?php

include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php';
include 'Photo.php';

final class Album {

    private $photos = [];


    public static function Instance(){
        static $inst = null;
        if($inst === null){
            $inst = new Album();
        }

        $inst->fill();

        return $inst;
    }
    
    private function __construct(){
    }

    public function getPhotos(){
        return $this->photos;
    }

    private function fill(){
        
        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance
 
        if($connection){
            $query = $connection->query("SELECT photos.*, members.name FROM photos, members JOIN members_photos ON members_photos.uid = members.id;");

            while($row = $query->fetch_array()){
                $photo = new Photo($row['pid'], $row['description'],$row['date'], $row['path'], $row['name']); 
                array_push($this->photos, $photo);
            }
        }else{
            echo "Cannot Retrieve Archive";
        }
        $db->closeConnection();
    }
}