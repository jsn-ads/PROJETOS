<?php

    global $pdo;

    $dbname ="mysql:dbname=php41;host:127.0.0.1";
    $dbuser ="adm";
    $dbpass ="229536";

    try{
        $pdo = new PDO($dbname,$dbuser,$dbpass);
    }catch(PDOException $e){
        echo "ERROR". $e->getMessage();
    }
?>