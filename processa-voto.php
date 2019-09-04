<?php

require "autoload.php";

use src\Votos;
use src\Erro;

try {
    $votos = new Votos();
    $votos->__set("id_categoria", $id_categoria);
    $votos->__set("categoria", $categoria);
    $votos->__set("id_historia", $id_historia);
    $votos->__set("historia", $historia);
    $votos->__set("email", $email);
    $votos->inserir();
    echo ' <br><br><br><span class="label success">Voto Realizado com Sucesso</span>';
} catch (Exception $e) {
    Erro::trataErro($e);
}