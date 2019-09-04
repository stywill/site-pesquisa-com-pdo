<?php
namespace src;
use src\Conexao;
/**
 * Description of Historias
 *
 * @author Wilson Oliveira
 */
class Historias 
{

    private $id;
    private $titulo;
    private $texto;
    private $categoria_id;
    private $categoria_nome;
    private $status;
    public function __construct($id=false) 
    {
        if($id){
            $this->__set("id",$id);
            $this->carregar();
        }
    }
    public function __get($par) 
    {
        return $this->$par;
    }
    public function __set($par, $valor) 
    {
        $this->$par = $valor;
    }
    public function carregar() 
    {
        $query = "SELECT id,id_categoria,titulo,texto,status FROM ".DB_PREFIX."historias WHERE id= :id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":id", $this->__get('id'));
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->__set('id',$linha['id']);
        $this->__set('categoria_id',$linha['id_categoria']);
        $this->__set('titulo',$linha['titulo']);
        $this->__set('texto',$linha['texto']);
        $this->__set('status',$linha['status']);
    }
    public function listar() 
    {
        $query = "SELECT h.id,id_categoria,titulo,c.categoria as categoria_nome,h.status"
                . " FROM ".DB_PREFIX."historias h LEFT JOIN ".DB_PREFIX."categorias c ON h.id_categoria = c.id";
        $conexao = Conexao::pegaConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    public static function listarPorCategoria($id_categoria = false)
    {
        $condicao = ($id_categoria)?" AND id_categoria = :id_categoria":"";
        $query = "SELECT id,id_categoria,titulo,texto FROM ".DB_PREFIX."historias WHERE status='A' $condicao";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        ($id_categoria)?$stmt->bindValue(":id_categoria", $id_categoria):"";
        $stmt->execute();
        return $stmt->fetchAll();    
    }
    public function atualizar() 
    {
        $query = "UPDATE ".DB_PREFIX."historias SET titulo= :titulo, texto= :texto, status = :status WHERE id=:id";
        $conexao = Conexao::pegaConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(":titulo",$this->__get('titulo'));
        $stmt->bindValue(":texto",$this->__get('texto'));
        $stmt->bindValue(":id",$this->__get('id'));
        $stmt->bindValue(":status",$this->__get('status'));
        $stmt->execute();
    }
}
