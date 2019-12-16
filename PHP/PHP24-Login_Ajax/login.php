<?php
    require 'config.php';

    if(isset($_POST['login']) && isset($_POST['senha']) && !empty($_POST['login']) && !empty($_POST['senha'])){
        
        $login = addslashes($_POST['login']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = "SELECT * FROM user WHERE login = :login AND senha = :senha";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':login', $login);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "Usuario Logado com Sucesso";
        }else{
            echo "Login e/ou Senha Errados!";
        }

    }else{
        echo "Digite um E-mail e/ou Senha";
    }
?>