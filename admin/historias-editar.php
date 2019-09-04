<?php require_once 'cabecalho.php' ?>
<?php

use src\Erro;
use src\Historias;
use src\Categorias;

try {
    $historias = new Historias($id);
    $listaCategoritas = Categorias::listar();
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar História</h2>
    </div>
</div>

<form action="historias-editar-post.php" method="post">
    <input type="hidden" name="id" value="<?=$historias->__get('id');?>">  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Titulo</label>
                <input type="text" name="titulo" value="<?=$historias->__get('titulo');?>" class="form-control" placeholder="Titulo da História" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Texto</label>
                <textarea name="texto" class="form-control" rows="10"><?=$historias->__get('texto');?></textarea>
            </div>
            <div class="form-group">
                <label for="nome">Categoria da História</label>
                <select class="form-control" name="id_categoria">
                    <option value="">Selecione</option>
                    <?php foreach ($listaCategoritas as $linha):?>
                    <option value="<?=$linha['id'];?>" <?=($linha['id']==$historias->__get('categoria_id'))?"selected":"";?>><?=$linha['categoria'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                    <option value="A" <?=($historias->__get('status')=='A')?'selected':'';?>>Ativo</option>
                    <option value="I" <?=($historias->__get('status')=='I')?'selected':'';?>>Inativo</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
