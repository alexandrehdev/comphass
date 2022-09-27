<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Painel\View;

class Route {

    private $url;


    private $resources;


    private static $instance = null;


    private View $view;

    

    public function __construct()
    {
        $this->resources = "/resources/views/";
        $this->url = $_SERVER["REQUEST_URI"];
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

        $keys = array_map(function($item){
            return "{{".$item."}}";
        },array_keys($vars));

        $content = $self->view->exists($view);

        if($path == $self->url){
           echo str_replace($keys,array_values($vars),$content);
        }
    }



    public static function redirect(string $path, callable $action) :void{
       $self = self::getInstance();

       $statement = ["path" => $path, "action" => $action];
       $response = explode(",", $statement["path"]);

       foreach($response as $result){
          if($result == $self->url){
             $action();
          }
       }

    }


    public static function get(string $url, mixed $action){
       $self = self::getInstance();

       if(is_array($action)){
         $object = new $action[0]();
         $object->{$action[1]}();

       }elseif(is_callable($action)){
           $action();
       }

    }






}
