<?php
    session_start();
    require 'config.php';

    if(empty($_SESSION['login'])){
        header('Location: login.php');    
    }

    if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])){

        if($_POST['password'] == $_POST['password2']){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = md5(addslashes($_POST['password']));
            $id_pai = $_SESSION['login'];

            $sql = "SELECT * FROM user WHERE email = :email";
            $sql = $connection->prepare($sql);
            $sql->bindValue(":email" , $email);
            $sql->execute();

            if($sql->rowCount() == 0){
                $sql = "INSERT INTO user SET id_pai = :id_pai , nome = :nome, email = :email, senha = :senha";
                $sql = $connection->prepare($sql);
                $sql->bindValue(":id_pai",$id_pai);
                $sql->bindValue(":nome",$nome);
                $sql->bindValue(":email",$email);
                $sql->bindValue(":senha",$senha);
                $sql->execute();

                header('Location: index.php');
                exit;
            }else{
                echo "Usuario Ja cadastrado";
            }

        }else{
            echo "A senhas são diferentes";
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
                <form method="POST" action="">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nome" placeholder="Digite o Nome">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Digite a E-mail">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Digite o Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password2" placeholder="Confirme o Password">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-outline-primary" type="submit" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>