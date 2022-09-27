<?php

namespace Guide\Comphass\Build;

class Builder{

    
    private $pathResources;


    private $pathRoute;


    function __construct(){
        $this->setPathResource("/resources/views/");
        $this->setPathRoute("/web/");
    }

    public function getPathResource() :string{
        return $this->pathResources;
    }

    public function setPathResource(string $pathResources) :void{
        $this->pathResources = $pathResources;
    }

    public function getRouteFolder() :string{
        return $this->pathRoute;
    }

    public function setPathRoute(string $pathRoute) :void{
        $this->pathRoute = $pathRoute;
    }
}
