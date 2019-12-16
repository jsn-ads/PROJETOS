<?php
    if(isset($_FILES['imagem'])){

        $arquivo = $_FILES['imagem'];
        move_uploaded_file($arquivo['tmp_name'], 'imagens/'.$arquivo['name']);

        echo "Arquivo de ".$_POST['nome']." enviado com sucesso";
    }
?>