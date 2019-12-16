<?php
	require 'config.php'; 
	session_start();
?>

<?php
	if(isset($_POST['agencia']) && !empty($_POST['agencia'])){

		$agencia = addslashes($_POST['agencia']);
		$conta = addslashes($_POST['conta']);
		$senha = md5(addslashes($_POST['senha']));

		$sql = $connection->prepare("SELECT * FROM conta WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
		$sql->bindValue(":agencia", $agencia);
		$sql->bindValue(":conta", $conta);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();

			$_SESSION['banco'] = $sql['id'];
			header("Location: index.php");
			exit();
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Caixa Eletronico</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST">
		Agência:<br>
		<input type="text" name="agencia"><br><br>
		Conta:<br>
		<input type="text" name="conta"><br><br>
		Senha<br>
		<input type="password" name="senha"><br><br>

		<input type="submit" value="Entrar">
	</form>
</body>
</html>