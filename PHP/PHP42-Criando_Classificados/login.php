<?php require 'pages/header.php';?>
    <div class="container">
        <h1>Login</h1>
        
        <?php
            require 'classes/usuarios.class.php'; 
            
            $u = new Usuarios();
            
            if(isset($_POST['e-mail']) && !empty($_POST['e-mail'])){
                $email = addslashes($_POST['e-mail']);
                $senha = $_POST['senha'];
                 
                if($u->login($email,$senha)){
                    ?>
                    
                    <script type="text/javascript">window.location.href="./";</script>

                    <?php
                }else{
                    ?>
                        <div class="alert alert-danger">
                            Usuario e/ou Senha invalido !!                        </div>
                    <?php
                }
            }?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="e-mail">E-mail</label>
                <input id="e-mail" class="form-control" type="e-mail" name="e-mail">
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input id="senha" class="form-control" type="password" name="senha">
            </div>

            <input type="submit" value="Login" class="btn btn-outline-dark">
        </form>
    </div>
<?php require 'pages/footer.php';?>