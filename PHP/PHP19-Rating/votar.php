<?php
    require 'config.php';

    if(!empty($_GET['id']) && !empty($_GET['voto'])){
        $id = addslashes(intval($_GET['id']));
        $voto = addslashes(intval($_GET['voto']));

        if($voto >= 1 && $voto <= 5){

            $sql = "INSERT INTO votos SET id_filme = :id_filme , nota = :nota";
            $sql = $connection->prepare($sql);
            $sql->bindValue(':id_filme', $id);
            $sql->bindValue(':nota', $voto);
            $sql->execute();

            $sql = "UPDATE filme SET media = (SELECT (SUM(nota)/COUNT(*)) FROM votos WHERE votos.id_filme = filme.id) WHERE id = :id";
            $sql = $connection->prepare($sql);
            $sql->bindValue(':id' , $id);
            $sql->execute();

            header('Location: index.php');
            exit;
        }
    }
?>