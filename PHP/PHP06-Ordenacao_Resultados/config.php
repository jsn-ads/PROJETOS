<?php
	$banco = "mysql:dbname=proj_ordenacao_resultados;host:127.0.0.1";
	$dbuser = "admin";
	$dbpass = "229536";

	try {

		$connection = new PDO($banco, $dbuser, $dbpass);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo "Error : ".$e->getMessage();
		exit;
	}
?>