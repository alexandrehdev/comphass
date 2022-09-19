<?php
namespace Guide\Comphass\Path;
use Guide\Comphass\Server\Response;

class Route{
    
    private static $error = "/error";

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
        $error = self::$error;

        if($_SERVER["REQUEST_URI"] == $error){
            (new Response)->getErrorPage();   
        }
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

        if($path != $_SERVER["REQUEST_URI"]){
            header("Location: /error");
        }else{
            self::$response = self::buildResponse($path,$action);
            $response = explode(",", self::$response["path"]);

            foreach($response as $result){
               if($result == $_SERVER["REQUEST_URI"]){
                 echo $action();
             }
        }
    }


}




}
