<?php
    class Usuarios{

        // função cadastrar usuario

        public function getTotalUsuarios(){
            global $pdo;
            
            $sql = $pdo->query("SELECT COUNT(*) as c FROM usuarios");
            $row = $sql->fetch();
             return $row['c'];
        }

        public function cadastrar($nome, $email, $senha, $telefone){

            global $pdo;

            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $sql->bindValue(":email",$email);
            $sql->execute();


            if($sql->rowCount() == 0){
                
                $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
                $sql->bindValue(":nome",$nome);
                $sql->bindValue(":email",$email);
                $sql->bindValue(":senha",md5($senha));
                $sql->bindValue(":telefone",$telefone);
                $sql->execute();

                return true;

            }else{
                return false;
            }
        }

        //funcão de login do usuario

        public function login($email, $senha){

            global $pdo;

            $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
            $sql->bindValue(":email",$email);
            $sql->bindValue(":senha",md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){

                $id = $sql->fetch();
                $id = $id['id'];

                $dados = $this->info($id);

                $_SESSION['cLogin'] = $dados;

                return true;

            }else{
                return false;
            }

        }


        //função de pegar dados do usuario pelo id

        public function info($id){

            global $pdo;

            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return $sql->fetch();
            
        }

    }
?>