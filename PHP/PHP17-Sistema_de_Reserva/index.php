<?php
    require 'config.php';
    require 'classes/carro.class.php';
    require 'classes/reserva.class.php';
    require 'classes/usuario.class.php';

    $reserva = new Reserva($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.css"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.css"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="botoes">
                    <a href="adicionar.php" class="btn btn-outline-info">Adicionar Reserva</a>

                    <form method="GET" action="">
                        <div class="form-group">
                            <select id="ano" class="btn btn-outline-warning" name="ano">
                                <?php for($q = date('Y'); $q >= 2000; $q--): ?>
                                <option> <?php echo $q; ?> </option>
                                <?php endfor ;?>
                            </select>
                            
                            <select id="mes" class="btn btn-outline-warning" name="mes">
                                <?php for($i = 1; $i <=12;$i++) :?>
                                <option><?php echo $i ?></option>
                                <?php endfor ;?>
                            </select>
                            
                            <input class="btn btn-outline-danger" type="submit" value="Mostrar">
                        </div>
                    </form>

                </div>

                <br><br>
                
                <?php
                    if(empty($_GET['ano'])){
                        exit;
                    } 
                    //ano e mes
                    $data = addslashes($_GET['ano'].'-'.$_GET['mes']);
                    //traz o primeiro dia da semana do mes
                    $dia1 = date('w',strtotime($data));
                    //traz quantidade de dias do mes
                    $dias = date('t',strtotime($data));
                    //linhas da semana no calendario, ceil arredonda o valor para cima.
                    $linhas = ceil(($dia1+$dias) / 7);

                    $dia1 = -$dia1;
                    $data_inicio = date('Y-m-d',strtotime($dia1.' days',strtotime($data)));

                    $data_fim = date('Y-m-d', strtotime((($dia1 + ($linhas*7)-1)).' days', strtotime($data)));

                    $lista = $reserva->getReservas($data_inicio , $data_fim);
                ?>

                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th data-field="id">Placa</th>
                            <th data-field="modelo">Modelo</th>
                            <th data-field="id_modelo">Marca</th>
                            <th data-field="id_usuario">Usuario</th>
                            <th data-field="data_inicio">Saida</th>
                            <th data-field="data_fim">Entrega</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lista as $item){
                            $data1 = date('d/m/Y', strtotime($item['data_inicio']));
                            $data2 = date('d/m/Y', strtotime($item['data_fim']));
                        ?>
                        <tr>
                            <td><?php echo $item['id'];?></td>
                            <td><?php echo utf8_encode($item['modelo']);?></td>
                            <td><?php echo utf8_encode($item['marca']);?></td>
                            <td><?php echo utf8_encode($item['nome']);?></td>
                            <td><?php echo $data1 ;?></td>
                            <td><?php echo $data2 ;?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php 
                    require 'calendario.php';
                ?>          
            </div>
        </div>
    </div>
</body>
</html>