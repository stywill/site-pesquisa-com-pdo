<?php

require'../autoload.php';

use src\Categorias;
use src\Erro;

try {
    $categorias = new Categorias($id);
    $categorias->__set('categoria', $categoria);
    $categorias->__set('status', $status);
    $categorias->atualizar();
    header('Location:categorias.php');

} catch (\Exception $e) {
    Erro::trataErro($e);
}
