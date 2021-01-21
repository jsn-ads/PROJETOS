<?php

    require 'config.php';

    $sql = "SELECT * FROM notificacoes WHERE id_user = '1' and status = '0'";
    $sql = $pdo->query($sql);

    $array = array();

    if($sql->rowCount() > 0){
        $array['qt'] = $sql->rowCount();
    }

    echo json_encode($array);
?>