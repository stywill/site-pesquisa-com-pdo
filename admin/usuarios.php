<?php
require_once 'cabecalho.php';

use src\Usuario;
use src\Erro;

try {
    $usuarios = new Usuario();
    $lista = $usuarios->listar();
} catch (\Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Usuários</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="usuarios-criar.php" class="btn btn-info btn-block">Crair Novo Usuário</a>
    </div>
</div>
<div class="row">
    <?php if (count($lista) > 0): ?>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>                     
                        <th>Nome</th>
                        <th>Login</th>
                        <th class="acao">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linhas): ?>
                        <?php $inativos=($linhas['status']=='I')?"alert-danger":"";?>
                        <tr class="<?=$inativos;?>">
                            <td><span class="<?=$inativos;?>"><?= $linhas['nome']; ?></span></td>
                            <td><span class="<?=$inativos;?>"><?= $linhas['login']; ?></span></td>
                            <td><span class="<?=$inativos;?>"><a href="usuarios-editar.php?id=<?=$linhas['id'];?>" class="btn btn-info">Editar</a></span></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Nenhum registro encontrado</p>
    <?php endif; ?>
</div>
<?php require_once 'rodape.php' ?>
