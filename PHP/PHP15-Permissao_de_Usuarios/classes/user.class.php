<?php

    class User{
        private $connection;
        private $id;
        private $permissoes;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function fazerLogin($email, $senha){

            $sql = "SELECT * FROM user WHERE email = :email AND senha = :senha";
            $sql = $this->connection->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->execute();

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();

                $_SESSION['logado'] = $sql['id'];

                return true;
            }else{
                return false;
            }
        }

        public function setUsuario($id){

            $this->id = $id;
            
            $sql = "SELECT * FROM user WHERE id = :id";
            $sql = $this->connection->prepare($sql);
            $sql->bindValue(":id",$id);
            $sql->execute(); 

            if($sql->rowCount() > 0){
                $sql = $sql->fetch();
                $this->permissoes = explode(',', $sql['permissoes']);
            }
        }

        public function getPermissoes(){
            return $this->permissoes;
        }

        public function verificarPermissao($p){
            if(in_array($p, $this->permissoes)){
                return true;
            }else{
                return false;
            }
        }

    }
?>   