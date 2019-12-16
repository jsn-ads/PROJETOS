<?php
	require 'config.php';
	session_start(); 
?>

<?php
	 if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])){

	 	$id = $_SESSION['banco'];

	 	$sql = $connection->prepare("SELECT * FROM conta WHERE id = :id");
	 	$sql->bindValue(":id", $id);
	 	$sql->execute();

	 	if($sql->rowCount() > 0){
	 		$dados = $sql->fetch();
	 	}else{
	 		header("Location: login.php");
	 		exit;
	 	}

	 }else{
	 	header("Location: login.php");
	 	exit;
	 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Caixa Eletronico</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Banco JSN</h1>
	Titular: <?php echo $dados['titular'];?><br>
	Agência: <?php echo $dados['agencia'];?><br>
	Conta : <?php echo $dados['conta'];?><br>
	Saldo : <?php echo $dados['saldo'];?><br>
	<a href="sair.php">Sair</a>
	<hr>
	<h3>Movimentação/Extrato</h3>

	<a href="add-transacao.php">Adicionar Transação</a><br><br>

	<div class="table">
		<div class="data">Data</div>
		<div class="valor">Valor</div>
	</div>

	<?php

		$sql = $connection->prepare("SELECT * FROM historico WHERE id_conta =:id_conta");
		$sql->bindValue(":id_conta", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			foreach ($sql->fetchAll() as $historico) {
	?>
			<div class="table">
				<div class="data"><?php echo date('d/m/Y H:i', strtotime($historico['data_operacao'])); ?></div>
				<div class="valor">
					<?php if($historico['tipo'] == '0'):?>
						<font color="green">R$ <?php echo $historico['valor'];?></font>
					<?php else: ?>
						<font color="red">-R$ <?php echo $historico['valor'];?></font>
					<?php endif; ?>
				</div>
			</div>
	<?php 
			}
		}


	 ?>
</body>
</html>