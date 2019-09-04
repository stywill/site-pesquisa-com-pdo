<?php require_once 'cabecalho.php' ?>
<?php
use src\Categorias;
use src\Erro;
try{
$categoria = new Categorias($id);
}catch(\Exception $e){
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="categorias-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="hidden" name="id" value="<?=$categoria->__get('id');?>">
                <input type="text" name="categoria" value="<?=$categoria->categoria;?>" class="form-control" placeholder="Nome da Categoria">
                <label for="nome">Status da Categoria</label>
                <select name="status" class="form-control">
                    <option value="A" <?=($categoria->__get('status')=='A')?'selected':''?>>Ativa</option>
                    <option value="I" <?=($categoria->__get('status')=='I')?'selected':''?>>Inativa</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
