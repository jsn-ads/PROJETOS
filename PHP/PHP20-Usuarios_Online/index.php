<?php
    require 'config.php';

    $ip = $_SERVER['REMOTE_ADDR'];
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('H:i:s');

    $sql = "INSERT acesso SET ip = :ip , hora = :hora";
    $sql = $connection->prepare($sql);
    $sql->bindValue(':ip',$ip);
    $sql->bindValue(':hora',$hora);
    $sql->execute();

    $sql = "DELETE FROM acesso WHERE hora < :hora";
    $sql = $connection->prepare($sql);
    $sql->bindValue(':hora', date('H:i:s', strtotime("-5 minutes")));
    $sql->execute();

    $sql = "SELECT * FROM acesso WHERE hora > :hora GROUP BY ip";
    $sql = $connection->prepare($sql);
    $sql->bindValue(':hora', date('H:i:s', strtotime("-5 minutes")));
    $sql->execute();

    echo "Usuarios ONLINE: ".$sql->rowCount();

?>