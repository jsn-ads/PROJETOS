<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clima em Tempo Real</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="tempo">
                    <div class="form-group">
                        <input id="cidade" class="form-control" type="text" name="cidade">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Pesquisar</button>
                    </div>
                    <div class="form-group">
                        <div id="resultado" class="resultado"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script text="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script text="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script text="text/javascript" src="script.js"></script>
</body>
</html>