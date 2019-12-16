<?php
    require 'config.php';

    $array = array();

    if(isset($_POST['texto'])){
        $texto = addslashes($_POST['texto']);

        $sql = "SELECT * FROM usuarios WHERE nome LIKE :texto";
        $sql = $conn->prepare($sql);
        $sql->bindValue(":texto",$texto.'%');
        $sql->execute();

        if($sql->rowCount() > 0){
            foreach($sql->fetchAll() as $pessoas){
               $array[] = array('nome'=>utf8_encode($pessoas['nome']), 'id'=>$pessoas['id']);
            }
        }

    }

    echo json_encode($array);
?>