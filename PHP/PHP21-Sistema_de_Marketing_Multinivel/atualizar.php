<?php
    session_start();
    require 'config.php';
    require 'funcoes.php';

    $sql = "SELECT id FROM user";
    $sql = $connection->query($sql);
    
    $usuarios = array();

    if($sql->rowCount() > 0){
        $usuarios = $sql->fetchAll();

        foreach($usuarios as $chave =>$usuario){
            $usuarios[$chave]['filhos'] = calcular_Patentes($usuario['id'], $limite-4);
        }
    }

    $sql = "SELECT * FROM patentes ORDER BY min DESC";
    $sql = $connection->query($sql);
    
    $patentes = array();

    if($sql->rowCount() > 0){
        $patentes = $sql->fetchAll();
    }

    foreach($usuarios as $usuario){

        foreach($patentes as $patente){

            if(intval($usuario['filhos']) >= intval($patente['min'])){

                $sql = "UPDATE user SET patente = :patente WHERE id = :id";
                $sql = $connection->prepare($sql);
                $sql->bindValue(":patente",$patente['id']);
                $sql->bindValue(":id",$usuario['id']);
                $sql->execute();

                break;
            }
        }
    }


?>