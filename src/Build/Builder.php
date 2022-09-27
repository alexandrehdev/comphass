<?php
namespace Guide\Comphass\Build;

class Builder{


    /**
     * statement 
     * 
     * @var mixed
     * @access private
     */
    private $statement = [];

    

    /**
     * pathResources 
     * 
     * @var mixed
     * @access private
     */
    private $pathResources;




    /**
     * pathRoute 
     * 
     * @var mixed
     * @access private
     */
    private $pathRoute;




    /**
     * request 
     * 
     * @var mixed
     * @access private
     */
    private $request;






    function __construct()
    {
       $this->setPathResource("/resources/views/");
       $this->setPathRoute("/web/");
       $this->setRequestUrl($_SERVER["REQUEST_URI"]);
       $this->setStatic(new Static());
       $this->setStatement(["path" => '', "action" => '']);
    }



    /**
     * getPathResource 
     *
     * @return string
     * @access public
     *
     */
    public function getPathResource() :string{
        return $this->pathResources;
    }



    /**
     * setPathResource 
     *
     * @return void
     * @access public
     */
    public function setPathResource(string $pathResources) :void{
        $this->pathResources = $pathResources;
    }




     /**
     * setPathResource 
     *
     * @return string
     * @access public
     */
    public function getRouteFolder() :string{
        return $this->pathRoute;
    }





     /**
     * setPathResource 
     *
     * @return void
     * @access public
     */
    public function setPathRoute(string $pathRoute) :void{
        $this->pathRoute = $pathRoute;
    }


    

    /**
     * getRequestUrl 
     *
     * @return string
     * @access public
     */
    public function getRequestUrl() :string{
        return $this->request;
    }




    /**
     * setRequestUrl 
     *
     * @return void
     * @access public
     */
    public function setRequestUrl(string $request) :void{
        $this->request = $request;
    }




    /**
     * getStatic 
     *
     * @return object
     * @access public
     */
    public function getStatic() :object{
        return $this->static;
    }




    /**
     * setStatic 
     *
     * @return void 
     * @access public
     */
    public function setStatic(object $static) :void{
        $this->static = $static;
    }




    /**
     * getStatement 
     *
     * @return array
     * @access public
     */
    public function getStatement() :array{
        return $this->statement;
    }





    /**
     * setStatement 
     *
     *@return void
     @access public
     */
    public function setStatement(array $statement) :void{
        $this->statement = $statement;
    }

}
