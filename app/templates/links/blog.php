<?php

class Blog extends Controller{
    
    public function index($name = '') {
        $user = $this->model('User');
        $user->name = "Sam";

        $this->view('blog/index', ['name' => $user->name]);
    }

    public function login($logincode = ''){
        
    }
}