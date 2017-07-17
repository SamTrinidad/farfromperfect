<?php

include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials

class User{

    private $id;
    private $name;
    private $email;
    private $logged = false;

    public function __construct($data){

        $db = new dbConnect(); //create a new object of the connection

        $connection = $db->getConnection(); //get the connection instance

        if($connection){

            //real escape the strings and strip slashes
            $uname = $db->clean($data['uname']);
            $pwd = $db->clean($data['pwd']);

            $query = $connection->query("select * from members where password='$pwd' AND username='$uname'"); //query for login

            $rows = mysqli_num_rows($query);

            
            if($rows == 1){
                while($row = $query->fetch_array()){
                    $this->id = $row['id'];
                    $this->name = $row['username'];
                    $this->email = $row['email'];
                    $this->logged = true;
                }
            }
            $query->close();
            $db->closeConnection();
        } 
    }
    
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function isLogged(){
        return $this->logged;
    }
}