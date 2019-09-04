<?php
require_once 'cabecalho.php';

use src\Categorias;
use src\Historias;
use src\Votos;
use src\Erro;

try{
    if($reset){
        $categoria = $historia = $validos = '';
    }
    $lista = Votos::listar($categoria,$historia,$validos,$reset);
    $listarCategorias = Categorias::listar();
    $listarHistorias = Historias::listarPorCategoria($categoria);
} catch (\Exception $e){
    Erro::trataErro($e);
}
?>
<div class="row">
    <div class="col-md-12">
        <h2>Buscar por</h2>
        <form action="votos.php" method="post">
            <div class="col-md-12">
                <div class="form-group">
                    <label>
                        Categoria:
                        <select name="categoria" class="form-control" onchange="submit()">
                            <option value="">Selecione</option>
                            <?php foreach ($listarCategorias as $linhaCategoria):?>
                            <option value="<?=$linhaCategoria['id'];?>" <?=($categoria == $linhaCategoria['id'])?'selected':'';?>><?=$linhaCategoria['categoria'];?></option>
                            <?php endforeach;?>
                        </select>
                    </label>
                    <label>
                        Histório:
                        <select name="historia" class="form-control" onchange="submit()">
                            <option value="">Selecione</option>
                            <?php foreach($listarHistorias as $linhaHistoria):;?>
                            <option value="<?=$linhaHistoria['id'];?>" <?=($historia == $linhaHistoria['id'])?'selected':'';?>><?=$linhaHistoria['titulo'];?></option>
                            <?php endforeach;?>
                        </select>
                    </label>
                    <label>
                        E-mail:
                        <select name="validos" class="form-control" onchange="submit()">
                            <option value="t" <?=($validos == "t")?'selected':'';?>>Todos</option>
                            <option value="v" <?=($validos == "v")?'selected':'';?>>Valido</option>
                        </select>
                    </label>
                    <label><input type="submit" class="form-control btn-primary" name="reset" value="Limpar"></label>
                </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h2>Votos</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table id="tab_votos" class="table table-responsive-sm table-striped datatable dataTable no-footer">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>História</th>
                    <th>E-mail</th>
                    <th>Data Cadastro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td><?=$linha['categoria']?></td>
                        <td><?= $linha['historia'] ?></td>
                        <td><?= $linha['email'] ?></td>
                        <td><?= $linha['data_cadastro'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
