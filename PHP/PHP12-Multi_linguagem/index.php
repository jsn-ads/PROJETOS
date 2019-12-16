<?php
    session_start();

    if(!empty($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }

    require 'config.php';
    require 'language.class.php';

    $lang = new Language();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi-Linguagem</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <script type="text/javascript" src="..assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="..assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="index.php?lang=en" class="btn btn-sm btn-outline-primary">English</a>
                <a href="index.php?lang=pt-br" class="btn btn-sm btn-outline-primary">Português</a>
                <a href="index.php?lang=esp" class="btn btn-sm btn-outline-primary">Espanhol</a>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                Linguagem Definida: <?php echo $lang->getLanguage();?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary" type="button"><?php $lang->get('BUY');?></button>
                <a href="" ><?php $lang->get('LOGOUT')?></a>
                <label class="label label-default"><?php echo $lang->get('NAME')?>: Neto</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                    $sql = "SELECT id, (SELECT valor from lang WHERE lang.lang = :lang and lang.nome = categorias.lang_item) as nome FROM categorias";
                    $sql = $connection->prepare($sql);
                    $sql->bindValue(":lang", $lang->getLanguage());
                    $sql->execute();

                    if($sql->rowCount() > 0){
                        foreach($sql->fetchAll() as $categoria){
                            echo $categoria['nome'].'<br/>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

