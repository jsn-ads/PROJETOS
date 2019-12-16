<?php
    session_start();

    if(!isset($_SESSION['captcha'])){
        
        $n = rand(1000, 9999);

        $_SESSION['captcha'] = $n;
    }

    if(!empty($_POST['email']) && !empty($_POST['senha'])){

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $codigo = addslashes($_POST['codigo']);

        if($codigo == $_SESSION['captcha']){
            $_SESSION['user'] = $email;
            header('Location: home.php');
        }else{
            echo "Codigo invalido";
            
            $n = rand(1000, 9999);

            $_SESSION['captcha'] = $n;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Captcha</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">    
                <form name="form-cap" method="POST" action="">

                    <div class="form-group">
                        <input id="email" class="form-control" type="text" name="email" placeholder="Email">
                    </div>
                    
                    <div class="form-group">
                        <input id="senha" class="form-control" type="password" name="senha" placeholder="Senha">
                    </div>

                    <div class="form-group">
                         <img src="imagem.php" width="100" height="50"> 
                    </div>

                    <div class="form-group">
                        <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Captcha">
                    </div>
                    <div class="form-group">
                        <input  class="btn btn-info" type="submit" value="verificar">
                    </div>
                </form>    
            </div>
        </div>
    </div>
</body>
</html>