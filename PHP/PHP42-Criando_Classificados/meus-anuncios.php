<?php 
    require 'pages/header.php';
    if(empty($_SESSION['cLogin'])){
        
        ?>
            <script type="text/javascript">window.location.href="login.php"</script>
        <?php
        exit;
    }
?>


    <div class="container">

        <h1>Meus Anúncios</h1>

        <a href="add-anuncio.php" class="btn btn-outline-dark">Adicionar Anúncio</a>

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Titulo</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                require 'classes/anuncios.class.php';
                
                $a = new Anuncios();

                $anuncios = $a->getMeusAnuncios();

                foreach($anuncios as $anuncio):
            ?>
                <tr>
                    <?php if(!empty($anuncio['url'])): ?>
                    <td><img src="assets/img/anuncios/<?php echo $anuncio['url'];?>" height="50"></td>
                    <?php else: ?>
                    <td><img src="assets/img/default.jpg" height="50"></td>
                    <?php endif;?>
                    <td><?php echo $anuncio['titulo']; ?></td>
                    <td>R$ <?php echo number_format($anuncio['valor'],2); ?></td>
                    <td>
                        <a href="editar-anuncio.php?id=<?php echo $anuncio['id'];?>" class="btn btn-outline-dark">Editar</a>
                        <a href="excluir-anuncio.php?id=<?php echo $anuncio['id'];?>"class="btn btn-outline-danger">Excluir</a>
                    </td>
                </tr>
            <?php 
                endforeach;           
            ?>
        </table>
    </div>
<?php require 'pages/footer.php'?>