<?php
    session_start();
    $_SESSION['login'] = '';
    require 'config.php';

    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['password']);

        $sql = "SELECT * FROM user WHERE email = :email AND senha = MD5(:senha)";
        $sql = $connection->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $id = $sql['id'];
            $_SESSION['login'] = $id;

            $ip = $_SERVER['REMOTE_ADDR'];
            $sql = "UPDATE user SET ip = :ip WHERE id = :id";
            $sql = $connection->prepare($sql);
            $sql->bindValue(":ip", $ip);
            $sql->bindValue(":id", $id);
            $sql->execute();

            header("Location: index.php");
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
                        <input class="form-control" type="text" name="email" placeholder="Email">
                    </div>    
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-outline-primary" type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>