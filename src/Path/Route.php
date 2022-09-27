<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Build\Structure;
use Guide\Comphass\Page\View;

class Route{
    

    private $response = [];


    private $url;


    private $path;


    private View $view;



    public static function getStatic(){
        return new Static;
    }



    function __construct(){
        (new Structure)->setUp();

        $this->url = $_SERVER["REQUEST_URI"];
        $this->view = new View;
    }


    
    public static function view(string $path, string $view, array $vars){
        $self = self::getStatic();

        $keys = array_map(function($item){
            return "{{".$item."}}";
        },array_keys($vars));

        $file = getcwd().$self->resources.="{$view}.painel.php";
        $content = (file_exists($file)) ? file_get_contents($file) : null;

        if($path == $self->currentUrl){
           echo str_replace($keys,array_values($vars),$content);
        }
    }



    public static function redirect(string $path, callable $action){

       $self = self::getStatic();
       $statement = ["path" => $path, "action" => $action];
       $response = explode(",", $statement["path"]);

       foreach($response as $result){
         if($result == $self->url){
            $action();
         }
      }

    }


    public static function get(string $page, array $action){
       $self = self::getStatic(); 

       $class = $action[0];
       $method = $action[0];

       if(class_exists($class)){
           $object = new $class;
           $object->{$method}();
       }else{
           View::pageContent($page, $action); 
       }
    }




}
