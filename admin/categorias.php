<?php
require_once 'cabecalho.php';

use src\Categorias;
use src\Erro;
try{
$lista = Categorias::listarAdmin();
} catch (\Exception $e){
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Categorias</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Categoria</th>
                    <th>Status</th>
                    <th class="acao">Editar</th>
                    <!--<th class="acao">Excluir</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <?php $inativos=($linha['status']=='I')?"alert-danger":"";?>
                    <tr class="<?=$inativos;?>">
                        <td><a href="categorias-detalhe.php?id=<?=$linha['id'] ?>" class="btn btn-link"><img src="../images/<?= $linha['imagem'] ?>" width="125px" height="auto"></a></td>
                        <td><a href="categorias-detalhe.php?id=<?=$linha['id'] ?>" class="btn btn-link"><span class="<?=$inativos;?>"><?= $linha['categoria'] ?></span></a></td>
                        <td><a href="categorias-detalhe.php?id=<?=$linha['id'] ?>" class="btn btn-link"><span class="<?=$inativos;?>"><?= $linha['status_nome'] ?></span></a></td>
                        <td><a href="categorias-editar.php?id=<?=$linha['id'] ?>" class="btn btn-info">Editar</a></td>
                        <!--<td><a href="categorias-excluir-post.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>-->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
