<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Server\Response;

class Route{
    

    private static $response = [];




    public static function buildResponse(string $path, callable $action){
        return ["path" => $path,"action" => $action];
    }

    /**
     * error 
     * 
     * @static
     * @access public
     * @return void
     */
    public static function error(){
        $response = new Response();
        echo $response->getErrorPage();
    }



    /**
     * redirect 
     * 
     * @param string $path 
     * @param callable $action 
     * @static
     * @access public
     * @return void
     */
    public static function redirect(string $path, callable $action){
      self::$response = self::buildResponse($path,$action);
      $response = explode(",", self::$response["path"]);

        foreach($response as $result){
            if($result == $_SERVER["REQUEST_URI"]){
                echo $action();
            }
        }

    }




}
