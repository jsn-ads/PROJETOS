<?php
    require 'config.php';
    require 'filme.class.php';

    $filme = new Filme($connection);

    $lista = $filme->getFilmes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js">></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <?php foreach($lista as $item): ?>
                    <fieldset>
                        <strong style="font-size:25px"><?php  echo $item['titulo']; ?></strong>
                        <br> 
                        <a href="votar.php?id=<?php echo $item['id'] ;?>&voto=1"><img class="img-fluid" src="../assets/img/star.png"></a>
                        <a href="votar.php?id=<?php echo $item['id'] ;?>&voto=2"><img class="img-fluid" src="../assets/img/star.png"></a>       
                        <a href="votar.php?id=<?php echo $item['id'] ;?>&voto=3"><img class="img-fluid" src="../assets/img/star.png"></a>
                        <a href="votar.php?id=<?php echo $item['id'] ;?>&voto=4"><img class="img-fluid" src="../assets/img/star.png"></a>
                        <a href="votar.php?id=<?php echo $item['id'] ;?>&voto=5"><img class="img-fluid" src="../assets/img/star.png"></a>
                        <strong> (<?php echo $item['media']; ?>) </strong>
                        <br> 
                    </fieldset>
                <?php endforeach ?>
            </div>
        </div>   
    </div>
</body>
</html>