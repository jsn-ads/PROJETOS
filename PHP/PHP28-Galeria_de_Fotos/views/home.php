<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="container-fluid" id="container">

        <fieldset>
            <legend>Adicionar</legend>
            <form method="post" id="formulario" enctype="multipart/form-data">
                
                <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Nome do Arquivo">

                <div class="custom-file" id="img">
                    <input type="file" name="arquivo" class="custom-file-input">
                    <label class="custom-file-label">Selecione Arquivo</label>
                </div>
                <input class="btn btn-primary" type="submit" value="Enviar" id="btn">
            </form>
        </fieldset>

        <br>
        <div class="galeria">
            <?php foreach($fotos as $foto):?>
                <div class="produto">
                    <div class="imagem">
                        <img src="assets/img/galeria/<?php echo $foto['url'];?>">
                    </div>
                    <div class="titulo">
                        <strong><?php echo $foto['titulo']; ?></strong>
                    </div>
                </div>
            <?php endforeach ;?>
        </div>                   
    </div>
</body>
</html>