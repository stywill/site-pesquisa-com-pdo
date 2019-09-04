<?php
require_once 'cabecalho.php';

use src\Categorias;
use src\Erro;

try {
    $categoria = new Categorias($id);
    $categoria->carregarHistorias();
    $listaHistorias = $categoria->__get('historias');
} catch (\Exception $e) {
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Categoria</h2>
    </div>
</div>

<dl>
    <dt><img src="../images/<?= $categoria->__get('imagem') ?>" width="325px" height="auto"></dt>
    <dd></dd>
    <dt>Nome:</dt>
    <dd><?= $categoria->__get('categoria') ?></dd>
    <dt>Histórias</dt>
    <dd>
        <ul>
            <?php foreach ($listaHistorias as $linhas): ?>
            <li><a href="historias-editar.php?id=<?=$linhas['id'];?>"><?=$linhas['titulo'];?></a></li>
            <?php endforeach; ?>
        </ul>
    </dd>
</dl>
<?php
require_once 'rodape.php';
?>