<?php
class App
{
    protected $ctrlr    = "ctrlr";
    protected $control  = "home";
    protected $method   = "index";    
    protected $param    = [];
    
    public function __construct() {
       Session::init();
       $url = $this->parseUrl() ? $this->parseUrl() : ["home"];
       
       if(file_exists("app/{$this->ctrlr}/{$url[0]}.php")){
           $this->control = $url[0];
           unset($url[0]);
       }
       
       require_once "app/{$this->ctrlr}/{$this->control}.php";
       $this->control = new $this->control;
       
       if (isset($url[1])) {
            if (method_exists($this->control, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
       
        
       $this->param = $url ? array_values($url) : [];
       call_user_func_array([$this->control, $this->method], $this->param);
       
    }
    
    
    public function parseUrl(){
        if(isset($_GET["url"])){
            $this->ctrlr = "ctrlr";
            return explode("/", filter_var(rtrim($_GET["url"] , "/"), FILTER_SANITIZE_URL));
        }
        if(isset($_GET["q"])){
            $this->ctrlr = "req";
            return explode("/", filter_var(rtrim($_GET["q"] , "/"), FILTER_SANITIZE_URL));
        }
    }
    
}