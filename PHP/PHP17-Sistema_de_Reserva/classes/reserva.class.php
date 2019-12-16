<?php 
    class Reserva{

        private $conn;

        public function __construct($connection){
            $this->conn = $connection;
        }

        public function getReservas($data_inicio, $data_fim){
            
            $array = array();

            $sql = "SELECT carro.id,carro.modelo, carro.marca, usuario.nome, reserva.data_inicio, reserva.data_fim
                    FROM carro INNER JOIN usuario INNER JOIN reserva
                    ON carro.id = reserva.id_carro
                    AND usuario.id = reserva.id_usuario
                    WHERE (NOT(data_inicio > :data_fim OR data_fim < :data_inicio ))";
            $sql = $this->conn->prepare($sql);
            $sql->bindValue(":data_inicio" , $data_inicio);
            $sql->bindValue(":data_fim" , $data_fim);
            $sql->execute();
            if($sql->rowCount() > 0){   
                $array = $sql->fetchAll();
            }
            return $array;
        }

        public function verificarDisponibilidade($carro, $data_inicio, $data_fim){

            $sql  = "SELECT * FROM reserva WHERE id_carro = :carro AND (NOT(data_inicio > :data_fim OR data_fim < :data_inicio ))";
            $sql = $this->conn->prepare($sql);
            $sql->bindValue(":carro", $carro);
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->execute();

            if($sql->rowCount() > 0){
                return false;
            }else{
                return true;
            }
        }

        public function adicionar($carro, $usuario, $data_inicio, $data_fim){
            $sql = "INSERT INTO reserva (id_carro, id_usuario, data_inicio, data_fim) VALUES(:carro, :usuario, :data_inicio, :data_fim)";
            $sql = $this->conn->prepare($sql);
            $sql->bindValue(":carro", $carro);
            $sql->bindValue(":usuario", $usuario);
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->execute();
        }
    }
?>  