<?php

require "vendor/autoload.php";
use Guide\Comphass\Path\Route;

/* vai chamar um arquivo .html */
/* responsavel so por alterar o conteudo */ 
/* header e footer segue o mesmo */

/* View::page(); */

Route::redirect("/",function(){
    return "tchurusbango";
});



