<?php

namespace src;
use src\Conexao;
/**
 * Description of Votos
 *
 * @author Wilson Oliveira
 */
class Votos {
    private $id;
    private $id_categoria;
    private $categoria;
    private $id_historia;
    private $historia;
    private $email;
    private $data_cadastro;

    public function __get($par)
    {
        return $this->$par;
    }

    public function __set($par, $valor)
    {
        $this->$par = $valor;
    }
    public static function listar($categoria,$historia,$emailValido,$reset)
    {
        if($reset){
            $condicao='';
        }else {
            $condicao = ($categoria) ? " AND id_categoria = :id_categoria" : "";
            $condicao .= ($historia) ? " AND id_historia = :id_historia" : "";
            $condicao .= ($emailValido == 'v') ? " AND (email LIKE :isacteep OR  email LIKE :cteep)" : "";
        }
        $query = "SELECT id,id_categoria,categoria,id_historia,historia,email,DATE_FORMAT(data_cadastro,'%d/%m/%Y %h:%i:%s')\"data_cadastro\" 
                  FROM ".DB_PREFIX."votos WHERE id<>0 $condicao ORDER BY categoria,historia";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        ($categoria)?$stmt->bindValue(':id_categoria',$categoria):'';
        ($historia)?$stmt->bindValue(':id_historia',$historia):'';
        ($emailValido=='v')?$stmt->bindValue(':isacteep',"%@isacteep.com.br"):'';
        ($emailValido=='v')?$stmt->bindValue(':cteep',"%@cteep.com.br"):'';
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function inserir()
    {
        $query = "INSERT INTO ".DB_PREFIX."votos (id_categoria,categoria,id_historia,historia,email,data_cadastro) 
                  VALUES (:id_categoria,:categoria,:id_historia,:historia,:email,:data_cadastro)";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id_categoria',$this->__get("id_categoria"));
        $stmt->bindValue(':categoria',$this->__get("categoria"));
        $stmt->bindValue(':id_historia',$this->__get("id_historia"));
        $stmt->bindValue(':historia',$this->__get("historia"));
        $stmt->bindValue(':email',$this->__get("email"));
        $stmt->bindValue(':data_cadastro',date("Y-m-d h:i:s"));
        $stmt->execute();
    }
}
