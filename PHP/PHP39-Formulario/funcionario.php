<?php

    require 'config.php';
  
    if(isset($_POST['nome']) && isset($_POST['rg']) && isset($_POST['cpf']) && isset($_POST['pai']) && isset($_POST['mae']) && isset($_POST['data']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['cel']) && isset($_POST['prof']) && isset($_POST['escol'])){
        
        $nome = utf8_decode(addslashes($_POST['nome']));
        $rg = addslashes($_POST['rg']);
        $cpf =  addslashes($_POST['cpf']);
        $pai = utf8_decode(addslashes($_POST['pai']));
        $mae = utf8_decode(addslashes($_POST['mae']));
        $data = addslashes($_POST['data']);
        $email = utf8_decode(addslashes($_POST['email']));
        $tel = addslashes($_POST['tel']);
        $cel = addslashes($_POST['cel']);
        $prof = utf8_decode(addslashes($_POST['prof']));
        $escol = addslashes($_POST['escol']);
        $cpf = str_replace('.','',$cpf);
        $cpf = str_replace('-','',$cpf);

        

        $sql = "INSERT INTO cadastro SET nome = :nome, rg = :rg, cpf = :cpf, pai = :pai, mae = :mae, data_ = :data_, email = :email, tel = :tel, cel = :cel, profissao = :prof, escolaridade = :escolaridade";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':nome',$nome);
        $sql->bindValue(':rg',$rg);
        $sql->bindValue(':cpf',$cpf);
        $sql->bindValue(':pai',$pai);
        $sql->bindValue(':mae',$mae);
        $sql->bindValue(':data_',$data);
        $sql->bindValue(':email',$email);
        $sql->bindValue(':tel',$tel);
        $sql->bindValue(':cel',$cel);
        $sql->bindValue(':prof',$prof);
        $sql->bindValue(':escolaridade',$escol);
        $sql->execute();
        
        echo "Funcionario Cadastrado";
    }else{
        echo "Cadastro não Realizado";
    }
?>