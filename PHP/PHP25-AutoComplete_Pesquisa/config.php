<?php 
    global $conn;

    $dbname = "mysql:dbname=php27;host:127.0.0.1";
    $dbuser = "adm";
    $dbpass = "229536";

    try {
        $conn = new PDO($dbname,$dbuser,$dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $t) {
        echo "ERROR : ".$t->getMessage();
        exit;
    }
?>