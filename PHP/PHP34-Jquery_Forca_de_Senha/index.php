<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forca de Senha</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <form method="post" action="" id="form-senha">
                    <div class="form-group">
                        <input id="senha" class="form-control" type="password" name="senha" placeholder="Informe a Senha">
                    </div>
                    <div class="form-group">
                        <label for="">Força :</label>
                       <div class="forca" id="forca"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>