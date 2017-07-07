<?php

class Blog extends Controller{
    
    public function index($name = '') {   
        $this->view('blog/index');
    }

    public function login($logincode = '', $connection = ''){
        if($logincode == 'THIQQSUCC' && $connection == 'connect'){
            $uname = $pwd = '';
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $uname = $this->test_input($_POST['uname']);
                $pwd = $this->test_input($_POST['pwd']);


                $this->view('blog/connect', ['uname' => $uname]);

                return;
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