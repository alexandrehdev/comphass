<?php
namespace Guide\Comphass\Page;
use Guide\Comphass\Build\Builder;

class View{

    
    /**
     * content
     *
     *@return string
     *@access public
     */
    public static function content(string $content, mixed &$vars) :string{
        $builder = new Builder;
        $path = getcwd() . $builder->getPathResource() . "{$content}.painel.php";
        $view = (file_exists($path)) ? file_get_contents($path) : null;

        $keys = array_map(function($item){
            return "{{". $item ."}}";
        },array_keys($vars));

        return str_replace($keys, array_values($vars), $view);
    }

}
