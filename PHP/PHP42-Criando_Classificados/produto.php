<?php require 'pages/header.php';?>
<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    $a = new Anuncios();
    $u = new Usuarios();
    $total_anuncios = $a->getTotalAnuncios();
    $total_usuarios = $u->getTotalUsuarios();

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = addslashes($_GET['id']);
    }else{
        ?>
        <script type="text/javascript">window.location.href="index.php";</script>
        <?php
        exit;
    }

    $info = $a->getAnuncio($id);

?>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="carousel slide" data-ride="carousel" id="meuCarousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach($info['fotos'] as $chave => $foto): ?>
                        <div class="carousel-item <?php echo ($chave=='0')?'carousel-item active':'';?>">
                            <img src="assets/img/anuncios/<?php echo $foto['url']; ?>"/>
                        </div>
                    <?php endforeach; ?>
                    <a class="carousel-control-prev" href="#meuCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#meuCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <h1><?php echo $info['titulo']; ?></h1>
            <h4><?php echo $info['categoria']; ?></h4>
            <p><?php echo $info['descricao']; ?></p>
            <br>
            <h3>R$ <?php echo number_format($info['valor'],2); ?></h3>
            <h4>Telefone: <?php echo $info['telefone']; ?></h4>
        </div>
    </div>
</div>

<?php require 'pages/footer.php';?>