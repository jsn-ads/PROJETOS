<?php
	require 'config.php'; 
?>

<?php 

	if(!empty($_GET['codigo'])){
		$codigo = addslashes($_GET['codigo']);

		$sql = "SELECT * FROM usuario WHERE codigo='$codigo'";
		$result = $connection->query($sql);

		if($result->rowCount() > 0){
			foreach ($result->fetchAll() as $usuario):
				if($usuario['qtd'] > 5){
					header("Location: index.php");
				}
			endforeach;
		}else{
			header("Location: index.php");
		}

	}else{
		header("Location: index.php");
		exit;
	}

	if(isset($_POST['email']) && !empty($_POST['email'])){

		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		$sql = "SELECT * FROM usuario WHERE email = '$email'";
		$result = $connection->query($sql);

		if($result->rowCount() > 0){
			echo "Usuario Existente";
		}else{

			$codigo = md5(rand(0,99999).rand(0,99999));
			$sql = "INSERT INTO usuario SET email='$email' , senha='$senha', codigo='$codigo'";
			$connection->query($sql);

			$userId = $usuario['id'];
			$userQtd = $usuario['qtd']  + 1;
			$sql = "UPDATE usuario SET qtd='$userQtd ' WHERE id = '$userId'";
			$connection->query($sql);

			unset($_SESSION['logado']);

			header("Location: index.php");
			exit;

		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
</head>
<body>
	<form method="POST">
		Email:<br>
		<input type="text" name="email"><br><br>
		Senha:<br>
		<input type="password" name="senha"><br><br>
		<input type="submit" value="salvar">	
	</form>
</body>
</html>

