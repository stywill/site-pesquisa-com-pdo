<?php

namespace src;

use src\Conexao;

/**
 * Description of Usuario
 *
 * @author Wilson Oliveira
 */
class Usuario
{
    private $id;
    private $nome;
    private $login;
    private $senha;
    public function __construct($id = FALSE)
    {
        if($id){
            $this->__set('id',$id);
            $this->carregar();
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function listar()
    {
        $query = "SELECT id,nome,login,senha,status FROM ".DB_PREFIX."usuarios";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public function carregar()
    {
        $query = "SELECT id,nome,login,senha,status FROM ".DB_PREFIX."usuarios WHERE id = :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id',$this->__get('id'));
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->__set('nome',$linha['nome']);
        $this->__set('login',$linha['login']);
        $this->__set('senha',$linha['senha']);
        $this->__set('status',$linha['status']);
    }
    public function inserir()
    {
        $query = "INSERT INTO ".DB_PREFIX."usuarios (nome,login,senha,status) VALUES (:nome,:login,:senha,:status)";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->bindValue(':login',$this->__get('login'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->bindValue(':status',$this->__get('status'));
        $stmt->execute();
        return $this;
    }
    public function  atualizar()
    {
        $query = "UPDATE ".DB_PREFIX."usuarios SET nome=:nome,login=:login,senha=:senha,status=:status WHERE id=:id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->bindValue(':login',$this->__get('login'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->bindValue(':status',$this->__get('status'));
        $stmt->bindValue(':id',$this->__get('id'));
        $stmt->execute();
        return $this;
    }
    public static function usuario($login,$senha) {
        $query = "SELECT id, nome,login,senha FROM " . DB_PREFIX . "usuarios WHERE status='A' AND login=:login AND senha= :senha";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
