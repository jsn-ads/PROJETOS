<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="ctr">
        <div class="row">
            <div class="col">
                <div class="bar-top">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="formulario">
                    <form action="" method="post">
                        <div class="form-area1">
                            <div class="f1c1">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input id="nome" class="form-control" type="text" name="nome" placeholder="Nome Completo">
                                </div>
                                <div class="form-group">
                                    <label>RG:</label>
                                    <input id="rg" class="form-control" type="text" name="rg" placeholder="000000">
                                </div>
                                <div class="form-group">
                                    <label>CPF:</label>
                                    <input id="cpf" class="form-control" type="text" name="cpf" placeholder="000.000.000-00">
                                </div>
                                <div class="form-group">
                                    <label>Pai:</label>
                                    <input id="pai" class="form-control" type="text" name="pai" placeholder="Nome do Pai">
                                </div>
                                <div class="form-group">
                                    <label>Mãe:</label>
                                    <input id="mae" class="form-control" type="text" name="mae" placeholder="Nome da Mãe">
                                </div>
                                <div class="form-group">
                                    <label>Data de Nascimento:</label>
                                    <input id="data" class="form-control" type="date" name="data" placeholder="dd/mm/YYYY">
                                </div>
                            </div>
                            <div class="f1c2">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input id="email" class="form-control" type="email" name="email" placeholder="example@email.com">
                                </div>
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input id="tel" class="form-control" type="text" name="tel" placeholder="(00)0000-0000">
                                </div>
                                <div class="form-group">
                                    <label>Celular:</label>
                                    <input id="cel" class="form-control" type="text" name="cel" placeholder="(62)0 0000-0000">
                                </div>
                                <div class="form-group">
                                    <label>Profissão</label>
                                    <input id="prof" class="form-control" type="text" name="prof" placeholder="Profissao">
                                </div>
                                <div class="form-group">
                                    <label>Escolaridade:</label>
                                    <select id="escolaridade" class="form-control" name="escolaridade">
                                        <option value="">Select</option>
                                        <option value="Sem Escolaridade">Sem Escolaridade</option>
                                        <option value="Fundamental">Fundamental</option>
                                        <option value="Médio">Médio</option>
                                        <option value="Superior">Superior</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-area2">
                            <div class="f2c1">
                                <div class="form-group">
                                    <input type="submit" value="Cadastrar" id="btn" class="btn btn-success">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" id="btn2">Limpar</button>
                                </div/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.mask.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>