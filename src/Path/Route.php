<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Painel\View;

class Route {

    private $url;


    private static $instance = null;


    private View $view;


    private $statement;

    

    public function __construct()
    {
        $this->resources = "/resources/views/";
        $this->url = $_SERVER["REQUEST_URI"];
        $this->view = new View;
        $this->statement = [];
    }


    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self;
        }
        return self::$instance;
    }


    public static function page(string $path, string $view, array $vars){
        $self = self::getInstance();
        $keys = $self->view->generateKeys($vars);
        $content = $self->view->exists($view);
        $self->view->responsePath($path,$self->url,$keys,array_values($vars),$content);
    }



    public static function get(string $path, callable $action) :mixed{
       $self = self::getInstance();
       $statement = $self->statement;
       $statement = ["path" => $path, "action" => $action];
       $response = explode(",", $statement["path"]);

       foreach($response as $result){
         return ($result == $self->url) ? $action() : '';
       }

    }
    
    

}



