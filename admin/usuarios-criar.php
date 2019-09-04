<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Criar Novo Usuário</h2>
    </div>
</div>

<form action="usuarios-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Npme</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome">
                <label for="login">Login</label>
                <input name="login" type="text" class="form-control" placeholder="Login">
                <label for="nome">Senha</label>
                <input name="senha" type="password" class="form-control" placeholder="Senha">
                <label for="nome">Status</label>
                <select class="form-control" name="status">
                    <option value="A" selected>Ativo</option>
                    <option value="I">Inativo</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
