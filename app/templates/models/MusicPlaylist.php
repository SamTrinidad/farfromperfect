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

    public function getSongs(){
        return $this->Songs;
    }

    private function fill(){
        include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials

        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance

        
        // if($connection){
        //     $query = $connection->query("select * from blogposts");

        //     while($row = $query->fetch_array()){ //fetch all blog posts

        //         $post = new BlogPost($row['pid'], $row['date'],$row['title'],$row['text']); //create a blogpost object

        //         array_push($this->BlogPosts, $post);
        //     }
        // }else{
        //     echo "Cannot Retrieve Archive";
        // }

        $db->closeConnection();
    }
    }

}