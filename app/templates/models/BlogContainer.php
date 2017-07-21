<?php
include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials
include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/models/BlogPost.php';

final class BlogContainer {

    private $BlogPosts = []; //blog posts within the array

//singleton instance of the blog
    public static function Instance(){
        static $inst = null;
        if($inst === null){
            $inst = new BlogContainer();
        }
        $inst->fill();

        return $inst;
    }

    private function __construct(){

    }

//function to fill the blog's array with blog posts
    private function fill(){
        
        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance

        
        if($connection){
            $query = $connection->query("select * from blogposts");

            while($row = $query->fetch_array()){ //fetch all blog posts

                $post = new BlogPost($row['pid'], $row['date'],$row['title'],$row['text']); //create a blogpost object

                array_push($this->BlogPosts, $post);
            }
        }else{
            echo "Cannot Retrieve Archive";
        }

        $db->closeConnection();
    }

    public function getPosts(){
        return $this->BlogPosts;
    }
}