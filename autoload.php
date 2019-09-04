<?php
include_once 'src/config.php';
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

error_reporting(E_PARSE);
//import_request_variables("gP","");
extract($_GET, EXTR_REFS, "");
extract($_POST, EXTR_REFS, "");
extract($_REQUEST, EXTR_REFS, "");


function load($namespace){
    $namespace = str_replace("\\","/",$namespace);
    $caminhoAbsoluto = __DIR__."/".$namespace.".php";
    return include_once $caminhoAbsoluto;
}
spl_autoload_register(__NAMESPACE__."\load");
