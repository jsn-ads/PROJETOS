<?php
    require 'config.php';
    $h = $_GET['h'];

    if(!empty($h)){
        $pdo->query("UPDATE user SET estado = '1' WHERE MDS(id) = '$h'");
        echo '<h2>Cadastro criado com sucesso</h2>';
    }

?>