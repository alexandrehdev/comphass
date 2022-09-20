<?php

require "vendor/autoload.php";
use Guide\Comphass\Path\Route;


Route::redirect("/",function(){
    return "tchurusbango";
});

Route::redirect("/fire",function(){
    return "fire";
});
  



