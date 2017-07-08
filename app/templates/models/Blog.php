<?php

final class Blog {

    private $BlogPosts = array();

    public static function Instance(){
        
        static $inst = null;
        if($inst === null){
            $inst = new Blog();
        }
        $this->fill();

        return $inst;
    }

    private function __construct(){

    }

    public function fill(){
        include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials

        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance

        if($connection){
            $query = $connection->query("select * from blogposts");
        }
    }
}