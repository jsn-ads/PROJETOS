<?php

    $dbname = 'mysql:dbname=php39;host:127.0.0.1';
    $dbuser = 'adm';
    $dbpass = '229536';

    try {
        global $conn;
        $conn = new PDO($dbname, $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $t) {
        echo "Error : ".$t->getMessage();
    }
?>