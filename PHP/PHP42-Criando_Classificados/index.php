<?php require 'pages/header.php';?>
<?php 
    require 'classes/anuncios.class.php';
    require 'classes/usuarios.class.php';
    require 'classes/categorias.class.php';
    $a = new Anuncios();
    $u = new Usuarios();
    $c = new Categorias();

    $filtros = array(
        'categoria' => '',
        'preco' => '',
        'estado' => ''
    );

    if(isset($_GET['filtros'])){
        $filtros = $_GET['filtros'];
    }

    $total_anuncios = $a->getTotalAnuncios($filtros);
    $total_usuarios = $u->getTotalUsuarios();
    $categorias = $c->getLista();

    $p = 1;
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $p = addslashes($_GET['p']);
    }

    $per_page = 2;

    $total_paginas = ceil($total_anuncios/$per_page);

    $anuncios = $a->getUltimosAnuncios($p,$per_page,$filtros);
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <h2>Nós Temos hoje <?php echo $total_anuncios; ?> Anúncios</h2>
            <p>E mais de <?php echo $total_usuarios; ?> cadastrados.</p>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h4>Pesquisa Avançada</h4>
                <form action="" method="get">

                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select name="filtros[categoria]" id="categoria" class="form-control">
                            <option value="">SELECT</option>
                            <?php foreach($categorias as $cat):?>
                                <option value="<?php echo $cat['id'];?>" <?php echo ($cat['id'] == $filtros['categoria'])?'selected="selected"':'';?>><?php echo utf8_encode(utf8_decode($cat['nome']));?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <select name="filtros[preco]" id="preco" class="form-control">
                            <option value="">SELECT</option>
                            <option value="0-100" <?php echo ($filtros['preco'] == '0-100')?'selected="selected"':'';?>>R$ 0 - 100</option>
                            <option value="101-500" <?php echo ($filtros['preco'] == '101-500')?'selected="selected"':'';?>>R$ 101 - 500</option>
                            <option value="501-1000" <?php echo ($filtros['preco'] == '501-1000')?'selected="selected"':'';?>>R$ 501 - 1000</option>
                            <option value="1001-5000" <?php echo ($filtros['preco'] == '1001-5000')?'selected="selected"':'';?>>R$ 1001 - 5000</option>
                            <option value="5001-10000" <?php echo ($filtros['preco'] == '5001-10000')?'selected="selected"':'';?>>R$ 5001 - 10000</option>
                            <option value="10001-50000" <?php echo ($filtros['preco'] == '10001-50000')?'selected="selected"':'';?>>R$ 10001 - 50000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado de Conservação:</label>
                        <select name="filtros[estado]" id="estado" class="form-control">
                            <option value="">SELECT</option>
                            <option value="0" <?php echo ($filtros['estado'] == '0')?'selected="selected"':'';?>>Ruim</option>
                            <option value="1" <?php echo ($filtros['estado'] == '1')?'selected="selected"':'';?>>Bom</option>
                            <option value="2" <?php echo ($filtros['estado'] == '2')?'selected="selected"':'';?>>Ótimo</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" value="Buscar">
                    </div>

                </form>
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
                                <a class="page-link" href="index.php?
                                <?php
                                    $w = $_GET;
                                    $w['p'] = $i;
                                    echo http_build_query($w);  
                                ?>">
                                <?php echo $i; ?></a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </nav>
            
            </div>
        </div>
    </div>

<?php require 'pages/footer.php';?>