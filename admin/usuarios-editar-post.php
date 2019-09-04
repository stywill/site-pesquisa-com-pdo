<?php
require'../autoload.php';
use src\Usuario;
use src\Erro;
try {
    $usuarios = new Usuario($id);
    $usuarios->__set('nome', $nome);
    $usuarios->__set('login', $login);
    $usuarios->__set('senha', $senha);
    $usuarios->__set('status', $status);
    $usuarios->atualizar();
    header('Location:usuarios.php');
} catch (\Exception $e) {
    Erro::trataErro($e);
}
