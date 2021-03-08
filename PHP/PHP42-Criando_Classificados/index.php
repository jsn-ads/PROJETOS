<?php require 'pages/header.php';?>
<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    $a = new Anuncios();
    $u = new Usuarios();
    $total_anuncios = $a->getTotalAnuncios();
    $total_usuarios = $u->getTotalUsuarios();

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = addslashes($_GET['p']);
    }

    $per_page = 3;

    $total_paginas = ceil($total_anuncios/$per_page);

    $anuncios = $a->getUltimosAnuncios($p,$per_page);
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Nós Temos hoje <?php echo $total_anuncios; ?> Anúncios</h2>
            <p>E mais de <?php echo $total_usuarios; ?> cadastrados.</p>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>Pesquisa Avançada</h4>
            </div>
            <div class="col-sm-9">
                <h4>Ultimos Anúncios</h4>
                <table class="table table-spriped">
                    <tbody>
                    <?php foreach($anuncios as $anuncio):?>
                        <tr>
                            <td>
                                <?php if(!empty($anuncio['url'])): ?>
                                <td><img src="assets/img/anuncios/<?php echo $anuncio['url'];?>" height="50"></td>
                                <?php else: ?>
                                <td><img src="assets/img/default.jpg" height="50"></td>
                                <?php endif;?>
                            </td>
                            <td>
                                  <a href="produto.php?id=<?php echo $anuncio['id']; ?>"><?php echo utf8_encode($anuncio['titulo']); ?></a><br>  
                                  <?php echo $anuncio['categoria'];?>
                            </td>
                            <td>R$ <?php echo number_format($anuncio['valor'],2); ?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php for ($i=1; $i <= $total_paginas; $i++):?>
                            <li class="<?php echo($p==$i)?'page-item active':''; ?>">
                                <a class="page-link" href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </nav>
            
            </div>
        </div>
    </div>

<?php require 'pages/footer.php';?>