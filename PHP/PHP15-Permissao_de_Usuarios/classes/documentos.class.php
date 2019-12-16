<?php
    Class Documentos{

        private $connection;

        public function __construct($connection){
            $this->connection = $connection;
        }

        public function getDocumentos(){

            $sql = "SELECT * FROM documentos";
            $sql = $this->connection->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;
        }


    }
?>