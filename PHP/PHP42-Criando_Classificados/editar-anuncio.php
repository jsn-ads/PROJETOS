<?php require 'pages/header.php';
if(empty($_SESSION['cLogin'])){
    
    ?>
        <script type="text/javascript">window.location.href="login.php"</script>
    <?php
    exit;
}

    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
        $titulo = ucfirst(strtolower(addslashes($_POST['titulo'])));
        $categoria = addslashes($_POST['categoria']);
        $valor = addslashes($_POST['valor']);
        $descricao = ucfirst(strtolower(addslashes($_POST['descricao'])));
        $estado = addslashes($_POST['estado']);

        $a->editAnuncio($titulo,$categoria,$valor,$descricao,$estado, $_GET['id']);
        ?>
            <div class="alert alert-success">
                Produto Editado com sucesso !
            </div>
        <?php
    }

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $info = $a->getAnuncio($_GET['id']);
    }else{
        ?>
            <script type="text/javascript">window.location.href="meus-anuncios.php"</script>
        <?php
            exit;
    }

    ?>

    <div class="container">
        <h1>Meus Anúncios - Editar Anúncio</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria" class="form-control">

                    <?php
                        require 'classes/categorias.class.php';
                        $c = new Categorias();
                        $cats = $c->getLista();
                        foreach($cats as $cat): 
                    ?>

                        <option value="<?php echo $cat['id'];?>"<?php echo ($info['id_categoria']==$cat['id'])?'selected="selected"':'';?>><?php echo  utf8_encode(utf8_decode($cat['nome']));?></option>

                    <?php
                        endforeach;
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input id="titulo" class="form-control" type="text" name="titulo" value="<?php echo $info['titulo'];?>">
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input id="valor" class="form-control" type="text" name="valor" value="<?php echo $info['valor'];?>">
            </div>

            <div class="form-group">
                <label for="Descrição">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="3" class="form-control"><?php echo $info['descricao'];?></textarea>
            </div>

            <div class="form-group">
                <label for="Estado">Estado de Conservação</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="0" <?php echo ($info['estado']==0)?'selected="selected"':'';?>>USADO</option>
                    <option value="1" <?php echo ($info['estado']==1)?'selected="selected"':'';?>>SEMI-NOVO</option>
                    <option value="2" <?php echo ($info['estado']==2)?'selected="selected"':'';?>>NOVO</option>
                </select>
            </div>

            <input type="Submit" value="Salvar" class="btn btn-outline-dark"/>
            
        </form>
        
    </div>

<?php require 'pages/footer.php';?>