<?php
    $dbname = "mysql:dbname=php21;host:127.0.0.1";
    $dbuser = "adm";
    $dbpass = "229536";

    try {
        global $connection;
        $connection = new PDO($dbname, $dbuser, $dbpass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Erro: ".$e->getMessage();
    }

    $limite = 3;
    $patentes = array();
?>