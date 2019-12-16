<?php
	session_start();
	require 'config.php'; 
?>

<?php 

	if(isset($_POST['tipo'])){
		$tipo = addslashes($_POST['tipo']);
		$valor = addslashes(str_replace(",", ".", $_POST['valor']));
		$valor = floatval($valor);

		$sql = $connection->prepare("INSERT INTO historico SET id_conta=:id_conta, tipo=:tipo,valor=:valor, data_operacao = NOW()");
		$sql->bindValue(":id_conta", $_SESSION['banco']);
		$sql->bindValue(":tipo",$tipo);
		$sql->bindValue(":valor",$valor);
		$sql->execute();

		if($tipo == 0){
			$sql = $connection->prepare("UPDATE conta SET saldo = saldo + :valor WHERE id=:id");
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":id", $_SESSION['banco']);
			$sql->execute();
		}else{
			$sql = $connection->prepare("UPDATE conta SET saldo = saldo - :valor WHERE id=:id");
			$sql->bindValue(":valor", $valor);
			$sql->bindValue(":id", $_SESSION['banco']);
			$sql->execute();
		}

		header("Location: index.php"); 
		exit;
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
		Tipo de transação:<br>
		<select name="tipo">
			<option value="0">Depósito</option>
			<option value="1">Retirada</option>
		</select><br><br>
		Valor:<br>
		<input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>
		<input type="submit" name="Adicionar">
	</form>
</body>
</html>