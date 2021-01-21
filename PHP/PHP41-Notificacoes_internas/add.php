<?php
    require 'config.php';

    $prop = array(
        'curtidor' => '2',
        'id_foto' => '123'
    );

    $sql = "INSERT INTO notificacoes SET id_user=:id_user , tipo =:tipo , propriedades=:prop , status=:status , link=:link";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id_user', '1');
    $sql->bindValue(':tipo', 'curtida');
    $sql->bindValue(':prop', json_encode($prop));
    $sql->bindValue(':status', 0);
    $sql->bindValue(':link', 'http://netogran.com/foto/123');
    $sql->execute();
?>