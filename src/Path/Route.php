<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Build\Structure;
use Guide\Comphass\Page\View;
use Guide\Comphass\Build\Builder;

class Route extends Builder{

    

    private $static;



    private $url;



    public function __construct()
    {
        $this->static = $this->getStatic();
        $this->url = $this->getRequestUrl();
    }


    
    public static function page(string $path, string $view, array $vars){
        $self = new Static();

        $keys = array_map(function($item){
            return "{{".$item."}}";
        },array_keys($vars));

        $file = getcwd().$self->resources.="{$view}.painel.php";
        $content = (file_exists($file)) ? file_get_contents($file) : null;

        if($path == $self->url){
           echo str_replace($keys,array_values($vars),$content);
        }
    }



    public static function redirect(string $path, callable $action) :void{
       $self = new Static();
       $statement = $self->getStatement();
       $statement["path"] = $path;
       $statement["action"] = $action;
       $response = explode(",", $statement["path"]);

       foreach($response as $result){
          if($result == $self->url){
             $action();
          }
       }

    }






}
