<?php 
	require 'config.php';

	if(!empty($_GET['token'])){

		$token = addslashes($_GET['token']);

		$sql = "SELECT * FROM token WHERE hash = :hash AND estado = 0 AND expirado > NOW()";

		$sql = $connection->prepare($sql);
		$sql->bindValue(":hash", $token);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$id = $sql['id_user'];

			if(!empty($_POST['senha'])){
				$senha = $_POST['senha'];

				$sql = "UPDATE user SET senha = :senha WHERE id = :id";
				$sql = $connection->prepare($sql);
				$sql->bindValue(":senha", md5($senha));
				$sql->bindValue(":id", $id);
				$sql->execute();

				$sql = "UPDATE token SET estado = 1 WHERE hash = :hash";
				$sql = $connection->prepare($sql);
				$sql->bindValue(":hash", $token);
				$sql->execute();

				echo "Senha Alterada com Sucesso";
			}

?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Redefinir</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="style.css">
			<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
		</head>
		<body>
			<div class="container-fluid" style="margin-top: 20px">
				<form id="form" method="POST">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input type="password" name="senha" placeholder="Digite Nova Senha" class="form-control">
								</div>
							<div class="form-group">
								<input type="submit" value="Salvar" class="btn btn-outline-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</body>
		</html>
<?php
		}else{
			echo "Token inválido ou usado";
			exit;
		}
	}
?>