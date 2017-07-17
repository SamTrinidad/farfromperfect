<?php

include $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/models/MusicPlaylist.php';

class Music extends Controller{

    public function index() {

        $playlist = MusicPlaylist::Instance();

        $this->view('music/index', ['playlist'=>$playlist]);
    }
}