<?php

    require 'environment.php';

    if(ENVIRONMENT == 'development'){
        //define caminho projeto , e pode ser utilizado menu
        define("BASE_URL","http://localhost/Projetos/05-PROJETOS/PHP/PHP40-Ajax_no_mvc/");
        $dbuser;
        $dbname;
        $dbpass;
    }else{
        $dbuser;
        $dbname;
        $dbpass;
    }

    global $conn;

    try {

        //$conn = new PDO($dbname, $dbuser, $dbpass);

    } catch (PDOExeception $t) {
        echo "ERROR :".$t->getMessage();
    }
?>