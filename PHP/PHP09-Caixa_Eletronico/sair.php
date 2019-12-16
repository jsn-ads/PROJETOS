<?php 
	//inicia a sessao
	session_start();

	//destroi a sessao
	unset($_SESSION['banco']);

	//redireciona a pagina
	header("Location: index.php");
	exit;

?>