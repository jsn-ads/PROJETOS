<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IMC</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="IMC">
                    <div class="form-group">
                        <label for=""><strong>Tabela IMC</strong></label>
                    </div>
                    <div class="form-group">
                        <input id="altura" class="form-control" type="text" name="altura" placeholder="Digite Altura...">
                    </div>
                    <div class="form-group">
                        <input id="peso" class="form-control" type="text" name="peso" placeholder="Digite seu Peso...">
                    </div>
                    <div class="form-group">
                        <button id="btn" class="btn btn-outline-dark">Calcular</button>
                    </div>
                    <div class="form-group" id="div-resultado">
                        <div id="resultado"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>