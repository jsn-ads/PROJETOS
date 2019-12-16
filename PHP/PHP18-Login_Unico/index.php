<?php

    session_start();
    require 'config.php';

    if(empty($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = $_SESSION['login'];

        $sql = "SELECT * FROM user WHERE id = :id AND ip = :ip";
        $sql = $connection->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":ip", $ip);
        $sql->execute();

        if($sql->rowCount() == 0){
            header("Location: login.php");
            exit;
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                Bem Vindo <?php echo "Usuario: ".$_SESSION['login']?>
            </div>
        </div>    
    </div>
</body>
</html>