<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jogo da Velha</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                 <div class="placar">
                    <p>E da vez de: </p><br>
                    <img src="" id="img">
                    <div class="vencedor" id="vencedor">Vencedor : <img src=""></div>   
                </div>

                <div class="area a1" data-marcado=""></div>
                <div class="area a2" data-marcado=""></div>
                <div class="area a3" data-marcado=""></div>
                <div style="clear:both"></div>
                <div class="area b1" data-marcado=""></div>
                <div class="area b2" data-marcado=""></div>
                <div class="area b3" data-marcado=""></div>
                <div style="clear:both"></div>
                <div class="area c1" data-marcado=""></div>
                <div class="area c2" data-marcado=""></div>
                <div class="area c3" data-marcado=""></div>
            </div>
        </div>
    </div>
   
    
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>