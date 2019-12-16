<?php

    require 'config.php';
    require 'classes/user.class.php';
    require 'classes/documentos.class.php';

    session_start();

    if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
    }

    $usuario = new User($connection);
    $usuario->setUsuario($_SESSION['logado']);

    $documentos = new Documentos($connection);
    $lista = $documentos->getDocumentos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bunlde.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table-resposive">
            <?php if($usuario->verificarPermissao('ADD')): ?>
                <a href="" class="btn btn-sm btn-outline-primary">Adicionar Documento</a>
                <br>
                <br>
            <?php endif; ?>
            <?php if($usuario->verificarPermissao('SECRET')): ?>
                <a href="paginasecreta.php">Pagina Secreta</a>
            <?php endif; ?>
                <br>
                <br>
            <table class="table table-sm table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Nome do Arquivo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $item):?>
                    <tr>
                        <td><?php echo utf8_encode($item['titulo']); ?></td>
                        <td>
                            <?php if($usuario->verificarPermissao('EDIT')): ?>
                                <a href="">Editar</a>
                            <?php endif;?>
                            <?php if($usuario->verificarPermissao('DEL')): ?>
                                <a href="">Excluir</a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>