<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace src;

use src\Usuario;

/**
 * Description of Login
 *
 * @author Wilson Oliveira
 */
class Login extends Usuario {

    private $caminho;
    private $login;
    private $senha;
    private $logado;
    public $usuario;

    public function __construct($login = false, $senha = false) {
        if ($login && $senha) {
            $this->__set('login', $login);
            $this->__set('senha', $senha);
            $this->pegaUsuario();
            $this->login();
        }
    }

    public function __set($param, $valor) {
        $this->$param = $valor;
    }

    public function __get($param) {
        return $this->$param;
    }

    public function pegaUsuario() {
        $this->usuario = Usuario::usuario($this->__get('login'), $this->__get('senha'));
        if ($this->usuario['id']) {
            $this->__set('logado', $this->usuario['id']);
        }
    }

    public function login() {
        if ($this->__get("logado")) {
            (!isset($_SESSION)) ? session_start() : false;
            setcookie('logado', $this->__get("logado"), time() - 3600);
            $_SESSION['logado'] = $this->__get("logado");
            $_SESSION['nome'] = $this->usuario['nome'];
            header('Location:home.php');
        }
    }

    public function estaLogado() {
        (!isset($_SESSION)) ? session_start() : false;
        if (!$_SESSION['logado']) {
            header('Location:index.php');
        }
    }

    public function logout() {
        (!isset($_SESSION)) ? session_start() : false;
        unset($_SESSION['logado']);
        unset($_SESSION['nome']);
        session_destroy();
        unset($_COOKIE["logado"]);
        header('Location:index.php');
    }

}
