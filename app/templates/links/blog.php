<?php

class Blog extends Controller{
    
    public function index($name = '') {   
        $this->view('blog/index');
    }

    public function login($logincode = '', $connection = ''){
        if($logincode == 'THIQQSUCC' && $connection == 'connect'){
            $uname = $pwd = '';

            //check if there is a post method on the login
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                //cleanse the output
                $uname = $this->test_input($_POST['uname']);
                $pwd = $this->test_input($_POST['pwd']);

                include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/db/dbConnect.php';

                $db = new dbConnect();

                $connection = $db->getConnection();

                if($connection){
                    $uname = $db->clean($uname);
                    $pwd = $db->clean($pwd);

                    $query = $connection->query("select * from members where password='$pwd' AND username='$uname'");

                    $rows = mysqli_num_rows($query);

                    if($rows == 1){
                        echo "Login success, Welcome ";
                        $this->view('blog/connect', ['uname' => $uname]);
                        return;
                    }
                }       
            }

            $this->view('blog/badlogin');
            
        }else if($logincode == 'THIQQSUCC'){
            $this->view('blog/login');
        }else{
            $this->index();
        }
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}