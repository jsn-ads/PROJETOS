<?php 
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

    //echo "Primeiro Dia:".$dia1.'<br>';
    //echo "quantidade de dias: ".$dias.'<br>';
    //echo "linhas: ".$linhas.'<br>';
    //echo "Data Inicio: ".$data_inicio.'<br>';
    //echo "Data Fim: ".$data_fim;
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Calendario</title>
     <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="style.css">
     <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
     <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
 </head>
 <body>
     <div class="container-fluid">
         <div class="row">
             <div class="col">
                <table class="table table-light table-bordered table-condensed">
                    <thead class="thead-light">
                        <tr>
                            <th data-field="dom">Dom</th>
                            <th data-field="seg">Seg</th>
                            <th data-field="ter">Ter</th>
                            <th data-field="qua">Qua</th>
                            <th data-field="qui">Qui</th>
                            <th data-field="sex">Sex</th>
                            <th data-field="sab">Sab</th>
                        </tr>
                    </thead>
                    <tbody class="table-bordered">
                        <?php for($l = 0; $l < $linhas; $l++) :?>
                        <tr>
                            <?php for($q = 0; $q < 7;$q++) :?>

                            <?php 
                                $w = date('Y-m-d', strtotime(($q+($l*7)).' days', strtotime($data_inicio)));
                            ?>
                            <td>
                                <?php
                                echo $w."<br><br>";
                                $w = strtotime($w);
                                foreach($lista as $item){
                                    $dr_inicio = strtotime($item['data_inicio']);
                                    $dr_fim = strtotime($item['data_fim']);

                                    if($w >= $dr_inicio && $w <= $dr_fim){
                                        echo utf8_encode($item['nome'])." (".$item['modelo'].")<br>";
                                    }
                                } 
                            ?>
                            </td>
                            <?php endfor; ?>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
             </div>
         </div>        
     </div> 
 </body>
 </html>