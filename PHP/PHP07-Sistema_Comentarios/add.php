<?php
	require 'config.php'; 
?>

<?php 

	if(isset($_POST['nome']) && !empty($_POST['nome'])){
		$nome = addslashes($_POST['nome']);
		$mensagem = addslashes($_POST['mensagem']);

		$sql = "INSERT INTO mensagens SET nome = '$nome' , msg = '$mensagem', data_msg = NOW()";
		$connection->query($sql);
		header("Location: index.php");
	}else{
		echo "dados nao foram inseridos";
	}
?>