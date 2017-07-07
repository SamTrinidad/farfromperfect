<?php

class Blog extends Controller{
    
    public function index($name = '') {   
        $this->view('blog/index');
    }

    public function login($logincode = '', $connection = ''){ //check for parameters at login
        if($logincode == 'THIQQSUCC' && $connection == 'connect'){
            $uname = $pwd = '';

            //check if there is a post method on the login
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                //cleanse the output
                $uname = $this->test_input($_POST['uname']);
                $pwd = $this->test_input($_POST['pwd']);

                include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php'; //include the db credentials

                $db = new dbConnect(); //create a new object of the connection

                $connection = $db->getConnection(); //get the connection instance

                if($connection){

                    //real escape the strings and strip slashes
                    $uname = $db->clean($uname);
                    $pwd = $db->clean($pwd);

                    $query = $connection->query("select * from members where password='$pwd' AND username='$uname'"); //query for login

                    $rows = mysqli_num_rows($query);

                    if($rows == 1){
                        $this->view('blog/connect', ['uname' => $uname]); //pass view with user
                        return;
                    }
                    $query->close();
                    $db->closeConnection();
                }       
            }

            $this->view('blog/badlogin'); //if anything fails view bad login
            
        }else if($logincode == 'THIQQSUCC'){ //go to login page if no other parameters
            $this->view('blog/login');
        }else{
            $this->index(); //go to blog page by default
        }
    }

//testing the input so there isnt any injections
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}