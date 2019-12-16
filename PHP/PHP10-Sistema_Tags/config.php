<?php 
	$banco = "mysql:dbname=proj_php_09; rost=127.0.0.1";
	$dbuser= "admin";
	$dbpass= "229536";

	try {
		$connection = new PDO($banco, $dbuser, $dbpass);
	    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
	} catch (Exception $e) {
		echo "ERROR : ".$e->getMessage();
	}
?>