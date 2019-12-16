<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload de foto com Ajax</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form method="POST" enctype="multipart/form-data" class="formulario" id="formulario" action="recebedor.php">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" type="text" name="nome">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="imagem">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-outline-primary" type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>