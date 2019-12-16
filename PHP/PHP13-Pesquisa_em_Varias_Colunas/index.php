<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Pesquisar em Varias Colunas</title>
</head>
<body>
    <div class="container-fluid">
        <form method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="my-input">Digite E-mail ou CPF</label>
                        <input id="campo" name="campo" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <input id="btn-consultar" class="btn btn-outline-primary" type="submit" value="consultar">
                    </div>
                    <hr/>
                    <div class="form-group">
                        <?php

                            require 'config.php';

                            if(isset($_GET['campo']) && !empty($_GET['campo'])){
                                $campo = addslashes($_GET['campo']);

                                $sql = "SELECT * FROM user WHERE email = :email OR cpf = :cpf";
                                $sql = $connection->prepare($sql);
                                $sql->bindValue(":email", $campo);
                                $sql->bindValue(":cpf", $campo);
                                $sql->execute();

                                if($sql->rowCount() > 0){
                                    $sql = $sql->fetch();

                                    echo "NOME : ".$sql['nome'];
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>

