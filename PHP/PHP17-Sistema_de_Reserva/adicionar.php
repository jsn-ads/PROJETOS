<?php
    require 'config.php';
    require 'classes/carro.class.php';
    require 'classes/reserva.class.php';
    require 'classes/usuario.class.php';

    $reserva = new Reserva($connection);
    $carro = new Carro($connection);
    $usuario = new Usuario($connection);

    if(!empty($_POST['carro']) && !empty($_POST['usuario']) && !empty($_POST['data_inicio']) && !empty($_POST['data_saida'])){
        $carro = addslashes($_POST['carro']);
        $usuario = addslashes($_POST['usuario']);
        $data_inicio = explode('/', addslashes($_POST['data_inicio']));
        $data_fim = explode('/',addslashes($_POST['data_saida']));

        $data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];
        $data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];

        if($reserva->verificarDisponibilidade($carro, $data_inicio, $data_fim)){
            $reserva->adicionar($carro, $usuario, $data_inicio, $data_fim);
            header('Location: index.php');
        }else{
            echo "Este carro já está reservado neste período.";
            exit;
        }

    }
?>

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
    <title>Adicionar Reserva</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form method="POST" action="" id="form-adicionar">

                    <div class="form-group">
                        <label style="width:100px">Carro:</label>
                        <select class="form-control" name="carro" style="width:300px">
                            <option>SELECT</option>
                            <?php
                               $lista = $carro->getCarros();
                               foreach($lista as $item):
                            ?>
                               <option value="<?php echo $item['id']?>"><?php echo $item['modelo']?></option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="width:100px">Usuario:</label>
                        <select class="form-control" name="usuario" style="width:300px">
                            <option>SELECT</option>
                            <?php
                                $lista = $usuario->getUsuarios();
                                foreach($lista as $item):
                            ?>
                                <option value="<?php echo $item['id']?>"><?php echo utf8_encode($item['nome'])?></option>
                            <?php endforeach?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="width:100px">Data Inicio</label>
                        <input class="form-control" type="text" name="data_inicio" style="width:150px">
                    </div>

                    <div class="form-group">
                        <label style="width:100px">Data Fim</label>
                        <input class="form-control" type="text" name="data_saida" style="width:150px">
                    </div>

                    <div class="form-group" id="btn_add_submit">
                        <input class="btn btn-primary" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>