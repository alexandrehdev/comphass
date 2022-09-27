<?php

namespace Guide\Comphass\Build;
use Guide\Comphass\Build\Builder;

class Structure{

    
    private Builder $builder;


    private $resources;

    
    private $route;


    function __construct(){
        $builder = new Builder;
        $this->resources = $builder->getPathResource();
        $this->route = $builder->getRouteFolder();
    }


    public function setUp(){
        $this->initFolders();     
        $this->initFiles();
    }


    public function initFolders() :void{
       $resources = $this->resources;
       $route = $this->route;

       if(!is_dir(getcwd() . $resources)){
          mkdir(getcwd() . $resources);
       }elseif(!is_dir(getcwd() . $route)){
          mkdir(getcwd() . $route);
       }else{
           /* dont do anything */
       }

    }


    public function initFiles() :void{
       $resources = $this->resources;
       $route = $this->route;

       if(file_exists(getcwd() . $resources . "welcome.painel.php")){
          fopen(getcwd() . $resources . "welcome.painel.php", 'w');
       }elseif(file_exists(getcwd() . $route . "route.php")){
          fopen(getcwd() . $route . "route.php", 'w');
       }else{
           /* dont do anything */
       } 
    }


}
