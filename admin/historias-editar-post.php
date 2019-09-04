<?php
require_once '../autoload.php';
use src\Erro;
use src\Historias;

try{
    $textoTratado = htmlspecialchars($texto);
    $historia = new Historias($id);
    $historia->__set('titulo',$titulo);
    $historia->__set('texto',$textoTratado);
    $historia->__set('status',$status);
    $historia->atualizar();
    header("Location:historias.php");
}catch(\Exception $e){
    Erro::trataErro($e);
}

