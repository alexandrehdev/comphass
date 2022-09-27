<?php
namespace Guide\Comphass\Painel;

class View{

    private $resources;


    private $extension;



    function __construct(){
        $this->extension = ".painel.php";
        $this->resources = "/resources/views/";
    }



    public function exists(string $view){
      if(file_exists(getcwd() . $this->resources . $view . $this->extension)){
          return file_get_contents(getcwd() . $this->resources . $view . $this->extension);
      }else{
          return false;
      }
    }
    
}
