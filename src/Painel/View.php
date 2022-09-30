<?php
namespace Guide\Comphass\Painel;

class View{

    private $resources;


    private $extension;


    private $root;


    function __construct(){
        $this->root = getcwd();
        $this->extension = ".painel.php";
        $this->resources = "/resources/views/";
    }


    public function generateKeys(array $content) :array{
        $keys = array_map(function($item){
            return "{{".$item."}}";
        },array_keys($content));  

        return $keys;
    }

    public function responsePath(string $path, string $url, array $keys, array $vars, string $content) :void{
        $values = array_values($vars);
        echo ($path == $url) ? str_replace($keys,$values,$content) : ' ';
    }


    public function exists(string $view){
        $root = $this->root;
        $resources = $this->resources;
        $extension = $this->extension;

        if(file_exists($root . $resources . $view . $extension))
        {
            $viewContent = file_get_contents($root . $resources . $view . $extension);

            return $viewContent;
        }
        else{

            return false;
        }
    }
    
}
