<?php
namespace Guide\Comphass\Server;

class Response{
    
    private $errorPage;    


    public function getErrorPage() :string{
        return $this->errorPage;
    }

    public function setErrorPage(string $error):void{
        $this->errorPage = file_get_contents($error);
    }

    function __construct(){
        $this->setErrorPage(__DIR__ . "/../../resources/response/errorPage.html");
    }
}

