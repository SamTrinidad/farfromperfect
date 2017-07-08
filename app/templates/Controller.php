<?php

class Controller {

    public function model($model, $data = []) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/models/' . $model . '.php';
        return new $model($data);
    }

    public function view($view, $data = []) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/farfromperfect/app/templates/views/' . $view  . '.php';
    }
}