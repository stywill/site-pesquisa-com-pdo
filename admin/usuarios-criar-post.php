<?php
require '../autoload.php';
use src\Usuario;
use src\Erro;
try {
    $usuario = new Usuario();
    $usuario->__set('nome', $nome);
    $usuario->__set('login', $login);
    $usuario->__set('senha', $senha);
    $usuario->__set('status', $status);
    $usuario->inserir();
    header('Location:usuarios.php');
} catch (\Exception $e) {
    Erro::trataErro($e);
}
