<?php

namespace Guide\Comphass\Build;
use Guide\Comphass\Build\Builder;

class Structure extends Builder{

    
    private $resources;

    
    private $route;


    function __construct(){
        $this->resources = $this->getPathResource();
        $this->route = $this->getRouteFolder();
    }


    public function setUp(){
        $this->initFolders();     
        $this->initFiles();
    }


    public function initFolders() :void{
       if(!is_dir(getcwd() . $this->resources)){
          mkdir(getcwd() . $this->resources);
       }elseif(!is_dir(getcwd() . $this->route)){
          mkdir(getcwd() . $this->route);
       }else{
           /* dont do anything */
       }

    }


    public function initFiles() :void{
       if(file_exists(getcwd() . $this->resources . "welcome.painel.php")){
          fopen(getcwd() . $this->resources . "welcome.painel.php", 'w');
       }elseif(file_exists(getcwd() . $this->route . "route.php")){
          fopen(getcwd() . $this->route . "route.php", 'w');
       }else{
           /* dont do anything */
       } 
    }


}
