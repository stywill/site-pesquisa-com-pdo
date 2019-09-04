<?php include_once '../src/config.php'?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=TITULO;?></title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-inverse"> </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Sejá bem-vindo ao Sistema de Controle de Histórias</h2>
                    <p>Insira suas credenciais para acessar</p>
                </div>
            </div>
            <div class="row">
                <form action="login.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label for="nome">Usuário</label>
                                <input type="text" name="usuario" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nome">Senha</label>
                                <input type="password" name="senha" value="" class="form-control">
                            </div>
                            <input type="submit" class="btn btn-success btn-block" value="Enviar">
                        </div>
                    </div>
                </form>
            </div>    
<?php require_once 'rodape.php' ?>
