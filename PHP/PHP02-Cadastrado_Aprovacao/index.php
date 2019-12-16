<?php 
    require 'config.php';

    if(isset($_POST['nome']) && isset($_POST['email']) && !empty($_POST['nome']) && !empty($_POST['email'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);

        echo 'Nome: '.$nome.' email: '.$email;

        $connection->query("INSERT INTO user SET nome = '$nome', email = '$email'");

        $id = $connection->lastInsertId();

        $md5 = md5($id);

        $link = 'http://localhost/confirmar.php?h='.$md5;

        $assunto = "Confirme seu cadastro";
        $msg = "Clique no link abaixo para confirma seu cadastro:\n\n".$md5;
        $headers = "From: suporte@b7web.com.br"."\r\n"."X-Mailer: PHP/".phpversion();

        mail($email , $assunto, $msg, $headers);

        echo "<h2>OK! Confirme seu cadastro agora!</h2>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JSN ADS Formulario</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <h1>Formulário</h1>
            <div>
        <div>
        <div class="row">
            <div class="col-sm">
                <form id="form" method="POST">

                    <div class="form-group">
                        <label class="label-default"><strong>Nome:</strong></label>
                        <input class="form-control" type="text" name="nome" placeholder="Nome..."/>
                    </div>

                    <div class="form-group">
                        <label class="label-default"><strong>Email:</strong></label>
                        <input class="form-control" type="text" name="email" placeholder="example@example.com"/>
                    </div>

                    <div class="form-group" id="campo-button">
                        <input class="btn btn-primary" type="input" value="Cadastrar"/>
                    </div>

                </form>
            <div>
        <div>
    <div>
</body>
</html>
