<?php
	require 'config.php'; 
?>

<?php 
	
	if(isset($_POST['email']) && !empty($_POST['email'])){

		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

		$result = $connection->query($sql);

		if($result->rowCount() > 0){
			foreach ($result->fetchAll() as $usuario):
	?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Home</title>
			</head>
			<body>
				Usuario: 
				<?php echo $usuario['email']; ?><br>
				<a href="sair.php">Sair</a><br>
				<p>Link: http://localhost/WEBProjetos\PHP\Projeto-07_Regristro_Convite\cadastrar.php?codigo=<?php echo $usuario['codigo']; ?></p>
			</body>
			</html>
	<?php 
			endforeach;
		}else{
			header("Location: index.php");
		}

	}else{
		header("Location: index.php");
	}

?>
