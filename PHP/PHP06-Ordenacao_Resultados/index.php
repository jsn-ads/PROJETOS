<?php
	require 'config.php'; 

	if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
		$ordem = addslashes($_GET['ordem']);
		$sql = "SELECT * FROM usuarios ORDER BY ".$ordem;
	}else{
		$ordem = '';
		$sql = "SELECT * FROM usuarios";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ordenacao Resultados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form method="GET">
		<select name="ordem" onchange="this.form.submit()">
			<option value="">Select</option>
			<option value="nome"<?php echo($ordem=="nome")?'selected="selected"':'';?>>Pelo nome</option>
			<option value="idade"<?php echo($ordem=="idade")?'selected="selected"':'';?>>Pela idade</option>
		</select>
	</form>

	<div class="tabela">
		<div class="nome">Nome</div>
		<div class="idade">idade</div>
		
		<?php 

			$result = $connection->query($sql);

			if($result->rowCount() > 0){
				foreach ($result->fetchAll() as $user): 
		?>
			<div class="nome"><?php echo $user['nome'];?></div>
			<div class="idade"><?php echo $user['idade'];?></div>
		<?php
			endforeach;
			}
		?>
	</div>
</body>
</html>