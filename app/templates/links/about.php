<?php

class About extends Controller{

    public function index($name = '') {
        $this->view('about/index');
    }
}