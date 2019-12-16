<?php 
	try {
		$dbname = "mysql:dbname=php03;host=127.0.0.1";
		$dbuser = "admin";
		$dbpass = "229536";

		$connection = new PDO($dbname, $dbuser, $dbpass);
		$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	} catch (Exception $e) {
		die($e->getMessage());
		exit;
	}
?>