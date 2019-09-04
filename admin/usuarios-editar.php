<?php require_once 'cabecalho.php' ?>
<?php
use src\Usuario;
use src\Erro;
try{
$usuario = new Usuario($id);
}catch(\Exception $e){
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Usuario</h2>
    </div>
</div>
<form action="usuarios-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="hidden" name="id" value="<?=$usuario->__get('id');?>">
                <input type="text" name="nome" value="<?=$usuario->__get('nome');?>" class="form-control" placeholder="Nome">
                <label for="nome">Login</label>
                <input type="text" name="login" value="<?=$usuario->__get('login');?>" class="form-control" placeholder="Login">
                <label for="nome">Senha</label>
                <input type="password" name="senha" value="<?=$usuario->__get('senha');?>" class="form-control" placeholder="Senha">
                <label for="nome">Status da Usuário</label>
                <select name="status" class="form-control">
                    <option value="A" <?=($usuario->__get('status')=='A')?'selected':''?>>Ativo</option>
                    <option value="I" <?=($usuario->__get('status')=='I')?'selected':''?>>Inativo</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
