<?php 
	require 'config.php';
?>

<fieldset>
	<form method="POST" action="add.php">
		Nome:<br>
		<input type="text" name="nome"><br><br>

		Mensagem:<br>
		<textarea name="mensagem"></textarea><br><br>

		<input type="submit" value="Enviar Mensagem">
	</form>
</fieldset>

<?php 
	$sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
	$result = $connection->query($sql);

	if($result->rowCount() > 0){
		foreach ($result->fetchAll() as $mensagem):			
?>
	<strong><?php echo $mensagem['nome']." - ".$mensagem['data_msg'];?></strong><br>
		<?php echo $mensagem['msg'];?>
	<hr>
<?php
	endforeach;
	}else{
		echo "não a mensages";
	}
?>

