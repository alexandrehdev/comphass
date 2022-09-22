<?php
namespace Guide\Comphass\Path;

class Route{
    

    private $response = [];


    private $currentUrl;


    public function __construct(){

        $this->currentUrl = $_SERVER["REQUEST_URI"];

    }



    public function buildResponse(string $path, callable $action){
        return ["path" => $path,"action" => $action];
    }



    public static function redirect(string $path, callable $action){
      $self = new Static;
      $self->response = $self->buildResponse($path,$action);
      $response = explode(",", $self->response["path"]);

      foreach($response as $result){
         if($result == $self->currentUrl){
           $action();
         }
      }

    }




}
