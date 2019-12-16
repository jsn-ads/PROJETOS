<?php

    require 'environment.php';

    if(ENVIRONMENT == 'development'){
        //define caminho projeto , e pode ser utilizado menu
        define("BASE_URL","http://localhost/01.PROJETOSWEB/Projetos/PHP/PHP28-Galeria_de_Fotos/");
        $dbname = "mysql:dbname=php28; host:127.0.0.1";
        $dbuser = "adm";
        $dbpass = "229536";
    }else{
        $dbname;
        $dbuser;
        $dbpass;
    }

    global $conn;

    try {

        $conn = new PDO($dbname, $dbuser, $dbpass);

    } catch (PDOExeception $t) {
        echo "ERROR :".$t->getMessage();
    }
?>