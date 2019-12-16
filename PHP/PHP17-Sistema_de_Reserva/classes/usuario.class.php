<?php
    class Usuario{

        private $conn;

        public function __construct($connection){
            $this->conn = $connection;
        }

        public function getUsuarios(){

            $array = array();

            $sql = "SELECT * FROM usuario";
            $sql = $this->conn->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }
?> 