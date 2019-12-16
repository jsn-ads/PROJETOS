<?php
    class Carro{

        private $conn;

        public function __construct($connection){
            $this->conn = $connection;
        }

        public function getCarros(){
            
            $array = array();

            $sql = "SELECT * FROM carro";
            $sql = $this->conn->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }
?>