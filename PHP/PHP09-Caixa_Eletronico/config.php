<?php 

	$banco = "mysql:dbname=proj_php_08;host=127.0.0.1";
	$dbname = "admin";
	$dbpass = "229536";

	try {
		
		$connection = new PDO($banco, $dbname, $dbpass);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo "Error : ".$e->getMessage();
	}

?>