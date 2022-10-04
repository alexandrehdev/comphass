<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Engine\Response;
use Guide\Comphass\Painel\View;

class Route {

    private static $instance = null;


    private View $view;

    
    private $url;
    
    

    public function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->resources = "/resources/views/";
        $this->view = new View;
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



    public static function get(string $path, mixed $action){

       $response = new Response;

       switch ($action) {
          case is_array($action):
             $response->runArray($path,$action);
             break;

          case is_callable($action):
             $response->runCallable($path,$action);
             break;
     }

    }
    
    

}



