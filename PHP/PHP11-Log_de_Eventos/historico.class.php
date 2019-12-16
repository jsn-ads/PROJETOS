<?php
	require 'config.php';

	class Historico{

		public function __construct(){	
			
		}

		public function registrar($acao){

			global $connection;

			$ip = $_SERVER['REMOTE_ADDR'];

			$sql = "INSERT INTO historico SET ip = :ip, data_evento = NOW(), evento = :evento";
			$sql = $connection->prepare($sql);
			$sql->bindValue(":ip", $ip);
			$sql->bindValue(":evento", $acao);
			$sql->execute();
		}
	}

?>