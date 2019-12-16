<?php
    require 'config.php';
    require 'classes/user.class.php';

    session_start();

    if(!empty($_POST['email']) && !empty($_POST['senha'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        $usuario = new User($connection);

        if($usuario->fazerLogin($email,$senha)){
            header("Location: index.php");
            exit;
        }else{
            echo "Usuário e/ou senha estão errados!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coelgo</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form method="POST" action="" id="login">
                    <div class="form-item">
                        <input id="email" class="form-control" name="email"  type="text" placeholder="Digite E-mail">
                    </div>
                    <div class="form-item"> 
                        <input id="senha" class="form-control" name="senha"  type="password" placeholder="Digite a Senha">
                    </div>
                    <div class="form-item">
                        <input id="btn-login" class="btn btn-outline-primary" type="submit" value="Acessar" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>