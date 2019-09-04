<?php

namespace src;

use src\Conexao;

/**
 * Description of Categorias
 *
 * @author Wilson Oliveira
 */
class Categorias {

    private $id;
    private $categoria;
    private $imagem;
    private $status;
    private $historias;
    
    public function __construct($id = false) {
        if ($id) {
            $this->__set('id', $id);
            $this->carregar();
        }
    }

    public function __get($par) {
        return $this->$par;
    }

    public function __set($par, $valor) {
        $this->$par = $valor;
    }

    public static function listar() {
        $query = "SELECT id,categoria,imagem,status,IF(status='A','Ativa','Inativa')'status_nome' FROM " . DB_PREFIX . "categorias  WHERE status = 'A'";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function listarAdmin() {
        $query = "SELECT id,categoria,imagem,status,IF(status='A','Ativa','Inativa')'status_nome' FROM " . DB_PREFIX . "categorias ";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


    public function atualizar() {
        $query = "UPDATE " . DB_PREFIX . "categorias SET categoria=:categoria, status=:status WHERE id=:id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':categoria', $this->__get("categoria"));
        $stmt->bindValue(':status',$this->__get("status"));
        $stmt->bindValue(':id', $this->__get("id"));
        $stmt->execute();
    }

    public function carregar() {
        $query = "SELECT id,categoria,imagem,status FROM " . DB_PREFIX . "categorias WHERE id=:id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->__get("id"));
        $stmt->execute();
        $lista = $stmt->fetch();
        $this->__set("categoria", $lista['categoria']);
        $this->__set("imagem", $lista['imagem']);
        $this->__set("status",$lista['status']);
    }

    public function carregarHistorias() {
        $historias = Historias::listarPorCategoria($this->__get("id"));
        $this->__set('historias',$historias);
    }
}
