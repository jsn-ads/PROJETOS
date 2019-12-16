<?php
	require 'config.php';
	//Verifica se o formulario foi preenchido
	if(!empty($_POST['email'])){

		$email = addslashes($_POST['email']);

		$sql = "SELECT * FROM user WHERE email = :email";
		$sql = $connection->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		//verifica se contem usuario

		if($sql->rowCount()	> 0){

			$result = $sql->fetch();
			$id = $result['id'];

			//criando tokem com data e numeros aleatorios 
			$token = md5(time().rand(0,9999).rand(0,9999));

			$sql = "INSERT INTO token SET id_user = :id_user, hash = :hash, expirado = :expirado";
			$sql = $connection->prepare($sql);
			$sql->bindValue(":id_user",$id);
			$sql->bindValue(":hash",$token);
			$sql->bindValue(":expirado",date('Y-m-d H:i', strtotime('+2 months')));
			$sql->execute();

			$link = "http://localhost/ProjetosWeb/PHP/10-PHP_Avancado/PHP03_Esqueci_Senha/redefinir.php?token=".$token;

			$mensagem = "Clique no link para redefinir sua senha sua senha:</br>".$link;

			$assunto = "Redefinir senha";

			$headers = 'From: example@example.com.br'."\r\n".'X-Mailer:PHP/'.phpversion();

			echo $mensagem;
			exit;	

		}
	}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Esqueci minha senha</title>
	<meta charset="utf-8" name="viewport" content="width=device-width , initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row"></div>
		<form id="form" method="POST">
			<div class="form-group">
				<label>Informe o email para qual sera enviado a nova senha</label>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="email" placeholder="E-mail@example.com">
			</div>
			<div class="form-group">
				<input class="btn btn-outline-primary" type="submit" value="Enviar">
			</div>
		</form>
	</div>
</body>
</html>