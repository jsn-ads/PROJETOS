<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="nav navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
            </div>
            
            <ul class="nav navbar-header navbar-right">
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])):?>
                    <li class=""><a class="nav-link text-light" href="meus-anuncios.php">Meus Anúncios</a></li>
                    <li class=""><a class="nav-link text-light" href="sair.php">Sair</a></li>
                <?php else: ?>
                    <li class=""><a class="nav-link text-light" href="cadastre-se.php">Cadastre-se</a></li>
                    <li class=""><a class="nav-link text-light" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
            
        </div>
    </nav>