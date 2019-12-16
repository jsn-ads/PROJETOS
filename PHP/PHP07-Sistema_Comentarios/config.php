<?php
	$banco ="mysql:dbname=proj_php_06;host:127.0.0.1";
	$dbname="admin";
	$dbpass="229536";

	try {

		$connection = new PDO($banco, $dbname, $dbpass);
		$connection-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch (PDOException $e) {
		echo "ERROR : ".$e->getMessage();
		exit;
	}

?>