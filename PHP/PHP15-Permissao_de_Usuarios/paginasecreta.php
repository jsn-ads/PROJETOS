<?php 
    session_start();

    require 'config.php';
    require 'classes/user.class.php';

    if(!isset($_SESSION['logado'])){
        header("Location: login.php");
        exit;
    }

    $usuario = new User($connection);
    $usuario->setUSuario($_SESSION['logado']);

    if($usuario->verificarPermissao("SECRET") == false){
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Pagina Secreta</h1>
</body>
</html>