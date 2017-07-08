<?php

class Blog extends Controller{
    
    public function index($name = '') {   
        $this->view('blog/index');
    }

    public function login($logincode = '', $connection = ''){ //check for parameters at login
        if($logincode == 'THIQQSUCC' && $connection == 'connect'){
            $uname = $pwd = '';
            $user;

            //check if there is a post method on the login
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                //cleanse the output
                $uname = $this->test_input($_POST['uname']);
                $pwd = $this->test_input($_POST['pwd']);
                
                $user = $this->model('User', ['uname'=>$uname,'pwd'=>$pwd]);     

            }

            //check if user is logged in
            if($user->isLogged()){
                $this->view('blog/connect', ['id'=>$user->getId(), 'uname'=>$user->getName(), 'email'=>$user->getEmail()]);
            }else{
                $this->view('blog/badlogin'); //if anything fails view bad login
            }        
        }else if($logincode == 'THIQQSUCC'){ //go to login page if no other parameters
            $this->view('blog/login');
        }else{
            $this->index(); //go to blog page by default
        }
    }

    public function logout(){
        session_start();
        session_unset(); 
        session_destroy();
        $this->view('blog/index');
    }

    public function addpost(){
        session_start();
        if(isset($_SESSION['id'])){
            $this->view('blog/addpost');
        }else{
            $this->view('blog/index');
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