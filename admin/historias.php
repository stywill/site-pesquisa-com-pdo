<?php
require_once 'cabecalho.php';

use src\Historias;
use src\Erro;

try {
    $historias = new Historias();
    $lista = $historias->listar();
} catch (\Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Historias</h2>
    </div>
</div>
<div class="row">
    <?php if (count($lista) > 0): ?>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>                     
                        <th>Categoria</th>
                        <th>Titulo</th>
                        <th class="acao">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linhas): ?>
                        <?php $inativos=($linhas['status']=='I')?"alert-danger":"";?>
                        <tr class="<?=$inativos;?>">
                            <td><span class="<?=$inativos;?>"><?= $linhas['categoria_nome']; ?></span></td>
                            <td><span class="<?=$inativos;?>"><?= $linhas['titulo']; ?></span></td>
                            <td><span class="<?=$inativos;?>"><a href="historias-editar.php?id=<?=$linhas['id'];?>" class="btn btn-info">Editar</a></span></td>
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
