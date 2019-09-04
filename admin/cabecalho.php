<?php 
require '../autoload.php';
session_start();
use src\Login;
$login = new Login();
$login->estaLogado();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=TITULO;?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Home</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">Home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="categorias.php">Categorias</a></li>
                <li><a href="historias.php">Histórias</a></li>
                <li><a href="votos.php">Votos</a></li>
                <li><a href="usuarios.php">Usuários</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="container">
    <label><h3>Olá: <?=$_SESSION['nome'];?></h3></label><hr>