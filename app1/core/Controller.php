<?php

class Controller{
    
    public function __construct() {
    }
    
    public function model($model){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }
    
    public function init_model($model){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "../app/models/" . $model . ".php";
    }
    
    
    public function lib($lib){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "app/lib/" . $lib . ".php";
        $file   =explode("/", $lib);
        $lib    = end($file);
        return new $lib();
    }
    
    
    public function library($lib, $param){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "app/lib/" . $lib . ".php";
        return new $lib( $param );
    }
    
    public function view($view, $data){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "app/views/" . $view . ".php";
    }
    
    public function load($view){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "app/views/" . $view . ".php";
    }
    
    public function load_data($view, $data){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        require_once "app/views/" . $view . ".php";
    }
    
}
