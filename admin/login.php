<?php

require '../autoload.php';

use src\Login;
use src\Erro;

try {
    $login = new Login($usuario, $senha);
    $login->login();
} catch (\Exception $e) {
    Erro::trataErro($e);
}
