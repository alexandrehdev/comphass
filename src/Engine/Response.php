<?php
namespace Guide\Comphass\Engine;

class Response
{

    const error = "404";


    const success = "200";


    private $statement;



    function __construct()
    {
        $this->url = $_SERVER["REQUEST_URI"];
        $this->statement = [];
    }


    public function runCallable(string $path, callable $action){
       $this->statement = ["path" => $path, "action" => $action];
       $response = explode(",", $this->statement["path"]);

       foreach($response as $result){
          return ($result == $this->url) ? $action() : '';
       }        

    }    


    public function runArray(string $path, array $action){
         if($path == $this->url){
            if(class_exists($action[0])){
                $object = new $action[0];
                $method = $action[1];
         
                $object->{$method}();

            }else{
                return Response::error;
            }
         }

    }

    
}


