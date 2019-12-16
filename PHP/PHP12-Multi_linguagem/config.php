<?php
    $dbname ="mysql:dbname=php12;host:127.0.0.1";
    $dbuser ="admin";
    $dbpass ="229536";

    try {
        global $connection;
        $connection = new PDO($dbname, $dbuser, $dbpass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'ERRO :'.$e->getMessage();
        exit();
    }
?>