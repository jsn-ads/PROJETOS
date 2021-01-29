<?php require 'pages/header.php';?>
    <div class="container">
        <h1>Cadastre-se</h1>
        
        <?php
            require 'classes/usuarios.class.php'; 
            $u = new Usuarios();
            
            if(isset($_POST['nome']) && !empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                $email = addslashes($_POST['e-mail']);
                $senha = $_POST['senha'];
                $telefone = addslashes($_POST['telefone']);

                if(!empty($nome) && !empty($email) && !empty($senha)){
                    if($u->cadastrar($nome, $email, $senha, $telefone)){
                        ?>
                        <div class="alert alert-success">
                            <strong>Parabéns!</strong> Cadastrado com sucesso. 
                            <a href="login.php" class="alert-link">Faça o login agora</a>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-warning">
                            Este usuário ja existe. 
                            <a href="login.php" class="alert-link">Faça o login agora</a>
                        </div>
                        <?php
                    }
                }else{ ?>
                    <div class="alert alert-warning">
                        Preencha todos os campos
                    </div>
                <?php
                }
               
            }?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" class="form-control" type="text" name="nome">
            </div>
            <div class="form-group">
                <label for="e-mail">E-mail</label>
                <input id="e-mail" class="form-control" type="e-mail" name="e-mail">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input id="senha" class="form-control" type="password" name="senha">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input id="telefone" class="form-control" type="text" name="telefone">
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-outline-dark">
        </form>
    </div>
<?php require 'pages/footer.php';?>