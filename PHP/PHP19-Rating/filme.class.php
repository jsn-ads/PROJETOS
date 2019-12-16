<?php
    class Filme{

        private $conn;

        public function __construct($connection){
            $this->conn = $connection;
        }

        public function getFilmes(){

            $array = array();

            $sql = "SELECT * FROM filme";
            $sql = $this->conn->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }
    }
?>