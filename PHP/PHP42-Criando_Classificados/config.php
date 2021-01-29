<?php
    session_start();

    try {

        $banco = 'mysql:dbname=projetos_php42;host=127.0.0.1';
        $user = "adm";
        $pass = "229536";

        $pdo = new PDO($banco,$user,$pass);

    } catch (\Throwable $th) {
        echo "ERROR: ".$th->getMessage();
        exit;
    }
?>