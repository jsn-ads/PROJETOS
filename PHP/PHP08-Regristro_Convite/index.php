<?php
	session_start();
	require 'config.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="home.php" method="POST">
		EMAIL:<br>
		<input type="text" name="email"><br><br>
		SENHA:<br>
		<input type="password" name="senha"><br><br>
		<input type="submit" name="Entrar">
		<a href="cadastrar.php">Cadastre-se</a>
	</form>
</body>
</html>