<?php
    require 'config.php';
    global $connection;

    $sexos = array(
        '0' =>  'Masculino',
        '1' =>  'Feminino'
    );

    if(isset($_POST['sexo']) && $_POST['sexo'] != ''){
        $sexo = $_POST['sexo'];
        $sql = "SELECT * FROM user WHERE sexo = :sexo";
        $sql = $connection->prepare($sql);
        $sql->bindValue(":sexo", $sexo);
        $sql->execute();
    }else{
        $sexo = '';
        $sql = "SELECT * FROM user";
        $sql = $connection->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filtro em Tabela</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped table-bordered">

                        <form method="POST" action="">
                            <div class="row" id="l-1">
                                <div class="col" id="c-1">
                                    <select class="form-control" name="sexo" id="sexo">
                                        <option value="">Select</option>
                                        <option value="0" <?php echo ($sexo=='0')?'selected="selected"':''?>>Masculino</option>
                                        <option value="1" <?php echo ($sexo=='1')?'selected="selected"':''?>>Feminino</option>
                                    </select>

                                    <input id="pesquisar" class="btn btn-sm btn-primary" type="submit" value="Filtrar">
                                </div>
                            </div>
                        </form>

                        <br>

                        <thead class="thead-light">
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="nome">NOME</th>
                                <th data-field="sexo">SEXO</th>
                                <th data-field="idade">IDADE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               
                                if($sql->rowCount() > 0){
                                    foreach($sql->fetchAll() as $item):
                            ?>
                        <tr class="secondary">
                            <td><?php echo $item['id'];?></td>
                            <td><?php echo $item['nome'];?></td>
                            <td><?php echo $sexos[$item['sexo']];?></td>
                            <td><?php echo $item['idade'];?></td>
                        </tr>
                            <?php
                                endforeach;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>