<?php
	$dbname ="mysql:dbname=php11;host:127.0.0.1";
	$dbuser ="admin";
	$dbpass ="229536";

try {
	$connection = new PDO($dbname, $dbuser, $dbpass);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
	echo "ERROR: ".$e->getMessage();
}

?>