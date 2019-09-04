<?php

require "autoload.php";

use src\Categorias;
use src\Erro;

try {
    $categorias = new Categorias();
    $categoriasLinhas = Categorias::listar();
} catch (\Exception $e) {
    Erro::trataErro($e);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=TITULO;?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="topo">
    <center><h1>Logo ou topo do site</h1></center>
</div>
<div class="container">
    <div class="row">
        <?php foreach ($categoriasLinhas as $contadorCategorias => $categoriasLinha): ?>
            <?php
            try {
                $accordionContagem = [$contadorCategorias . "One", $contadorCategorias . "Two", $contadorCategorias . "Three"];
                $categorias->__set('id', $categoriasLinha['id']);
                $categorias->carregarHistorias();
                $historiasLinhas = $categorias->__get('historias');
                ?>
                <div class="col-md-6">
                    <div class="tabela-header">
                        <img src="images/<?= $categoriasLinha['imagem']; ?>" alt="">
                        <p>Clique nas abas abaixo, conheça as histórias e vote na sua preferida</p>
                        <div id="accordion<?= $contadorCategorias; ?>">
                            <?php foreach ($historiasLinhas as $historiasChave => $historiasLinha): ?>
                                <div class="card">
                                    <div class="card-header" id="heading<?= $accordionContagem[$historiasChave]; ?>" aria-expanded="false">
                                        <h5 class="mb-0">
                                            <button class="btn collapsed" data-toggle="collapse" data-target="#collapse<?= $accordionContagem[$historiasChave]; ?>" aria-expanded="false" aria-controls="collapse<?= $accordionContagem[$historiasChave]; ?>">
                                                <?= $historiasLinha['titulo']; ?>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse<?= $accordionContagem[$historiasChave]; ?>" class="collapse" aria-labelledby="heading<?= $accordionContagem[$historiasChave]; ?>" data-parent="#accordion<?= $contadorCategorias; ?>">
                                        <div class="card-body">
                                            <?= $historiasLinha['texto']; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tabela">
                        <form id="form<?= $contadorCategorias ?>" action="" method="post" enctype="multipart/form-data">
                            <h4>* Obrigatórios</h4>
                            <div class="input-holder">
                                <h3>E-mail <span>*</span></h3>
                                <input type="text" placeholder="Seu e-mail" class="emailinput" id="seu_email<?= $contadorCategorias; ?>" name="seu_email<?= $contadorCategorias; ?>" value="" onkeypress="limpaErro('seu_email<?= $contadorCategorias; ?>')">
                                <input type="hidden" id="categoria_id<?= $contadorCategorias; ?>" name="categoria_id<?= $contadorCategorias; ?>" value="<?= $categoriasLinha['id']; ?>">
                                <input type="hidden" id="categoria<?= $contadorCategorias; ?>" name="categoria<?= $contadorCategorias; ?>" value="<?= $categoriasLinha['categoria']; ?>">
                                <label class="mostra_erro" id="seu_email<?= $contadorCategorias; ?>_erro"></label>
                            </div>
                            <h2>Qual história de <?= $categoriasLinha['categoria']; ?> merece seu voto? <span>*</span></h2>
                            <?php $opcaoNumero = 1; ?>
                            <?php foreach ($historiasLinhas as $historiasChave => $historiasLinha): ?>
                                <div class="form-check">
                                    <label class="form-check-label" for="escolha<?= $historiasChave; ?>">
                                        <input type="radio" class="form-check-input" id="sua_escolha<?= $contadorCategorias; ?>_<?= $historiasChave; ?>"  name="sua_escolha<?= $contadorCategorias; ?>" value="<?= $historiasLinha['titulo']; ?>" onclick="limpaErro('sua_escolha<?= $contadorCategorias; ?>')">
                                        <input type="hidden" id="id_sua_escolha<?= $contadorCategorias; ?>_<?= $historiasChave; ?>" name="id_sua_escolha<?= $contadorCategorias; ?>_<?= $historiasChave; ?>" value="<?= $historiasLinha['id']; ?>">
                                        <?= $opcaoNumero++ . ") " . $historiasLinha['titulo']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <div id="div_ret<?= $contadorCategorias; ?>">
                                <label class="mostra_erro" id="sua_escolha<?= $contadorCategorias; ?>_erro"></label><br>
                                <input type="hidden" id="conta_resposta<?= $contadorCategorias; ?>" name="conta_resposta<?= $contadorCategorias; ?>" value="<?= count($historiasLinhas); ?>">
                                <input class="formato_botao" type="button" name="enviar" value="Enviar" onclick="valida(<?= $contadorCategorias; ?>)">
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            } catch (Exception $e) {
                src\Erro::trataErro($e);
            }
            ?>
        <?php endforeach; ?>
    </div>
</div>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/envio.js"></script>
<script type="text/javascript" src="js/validacoes.js"></script>
</body>
</html>


