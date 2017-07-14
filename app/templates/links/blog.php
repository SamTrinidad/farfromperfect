<?php

class Blog extends Controller{
    

    public function index($name = '') {   
        include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/models/BlogContainer.php';

        //get the blog container singleton
        $blogcontainer = BlogContainer::Instance();

        //push it to the view
        $this->view('blog/index', ['blog'=>$blogcontainer]);
    }

    public function login($logincode = '', $connection = ''){ //check for parameters at login
        if($logincode == 'THIQQSUCC' && $connection == 'connect'){
            $uname = $pwd = '';
            $user;

            //check if there is a post method on the login
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                //cleanse the input
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

//destroy current session
    public function logout(){
        session_start();
        session_unset(); 
        session_destroy();
        $this->index();
    }

//addpost route if logged in
    public function addpost(){
        session_start();
        if(isset($_SESSION['id'])){
            $this->view('blog/addpost');
        }else{
            $this->index();
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