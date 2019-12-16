<?php

    require 'config.php';

    Class User{

        public function getAllUser(){
            
            global $connection;

            $sql = "SELECT * FROM user";
            $sql = $connection->prepare($sql);
            $sql->execute();

            if($sql->rowCount() > 0){
                return $sql->fetchAll();
            }else{
                return Array();
            }
        }
    }
?>