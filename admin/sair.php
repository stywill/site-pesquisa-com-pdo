<?php

require '../autoload.php';

use src\Login;

$login = new Login($usuario, $senha);
$login->logout();
