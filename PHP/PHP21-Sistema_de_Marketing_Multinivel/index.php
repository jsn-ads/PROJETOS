<?php

    session_start();
    require 'config.php';
    require 'funcoes.php';

    if(empty($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }

    $id = $_SESSION['login'];

    $sql = "SELECT user.nome , patentes.nome as patente
            FROM user INNER JOIN patentes
            ON user.patente = patentes.id
            WHERE user.id = :id";
    $sql = $connection->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $sql = $sql->fetch();
        $usuario = $sql['nome'];
        $patente = $sql['patente'];
    }else{
        header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Sistema de Marketing Multinivel</h1>
                <h2><?php echo "Usuario: ".$usuario." Patente: ".$patente; ?></h2>
                <a href="cadastrar.php" class="btn btn-outline-primary">Cadastrar</a>
                <a href="sair.php" class="btn btn-outline-primary">Sair</a>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php $lista = listar($id,$limite);?>
                <?php exibir($lista); ?>
            </div>
        </div>
    </div>
</body>
</html>