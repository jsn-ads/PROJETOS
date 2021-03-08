<?php
    class Anuncios{

        public function getUltimosAnuncios($page, $perPage){
            
            global $pdo;

            $offset = ($page - 1) * $perPage;

            $array = array();

            $sql = $pdo->prepare("SELECT * ,
                            (select anuncios_img.url from anuncios_img where anuncios_img.id_anuncio = anuncios.id limit 1) as url,
                            (select categorias.nome from categorias where categorias.id = anuncios.id_categoria) 
                        as categoria FROM anuncios ORDER BY id DESC LIMIT $offset, $perPage");
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;

        }

        public function getTotalAnuncios(){

            global $pdo;
            
            $sql = $pdo->query("SELECT COUNT(*) as c FROM anuncios");
            $row = $sql->fetch();
             return $row['c'];
        }

        // funcão para adicionar anuncios
        public function addAnuncio($titulo,$categoria,$valor,$descricao,$estado){

            global $pdo;

            $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado");
            $sql->bindValue(":titulo",$titulo);
            $sql->bindValue(":id_categoria",$categoria);
            $sql->bindValue(":id_usuario",$_SESSION['cLogin']['id']);
            $sql->bindValue(":descricao",$descricao);
            $sql->bindValue(":valor",$valor);
            $sql->bindValue(":estado",$estado);
            $sql->execute();
        }
        
        // função para pegar categorias no banco de dados e popular em uma array
        public function getMeusAnuncios(){

            global $pdo;

            $array = array();

            $sql = $pdo->prepare(
                        "SELECT * ,
                        (select anuncios_img.url from anuncios_img where anuncios_img.id_anuncio = anuncios.id limit 1) as url
                        FROM anuncios
                        WHERE id_usuario = :id_usuario");
            $sql->bindValue(":id_usuario", $_SESSION['cLogin']['id']);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll();
            }

            return $array;

        }

        public function excluirAnuncio($id){

            global $pdo;

            $sql = $pdo->prepare("DELETE FROM anuncios_img WHERE id_anuncio = :id_anuncio");
            $sql->bindValue(":id_anuncio", $id);
            $sql->execute();

            $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

        }

        public function excluirFoto($id){

            global $pdo;
            
            $id_anuncio = 0;

            $sql = $pdo->prepare("SELECT id_anuncio FROM anuncios_img WHERE id = :id");
            $sql->bindValue(":id",$id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $row = $sql->fetch();
                $id_anuncio = $row['id_anuncio'];
            }

            $sql = $pdo->prepare("DELETE FROM anuncios_img WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            return $id_anuncio;

        }

        public function getAnuncio($id){

            global $pdo;
            $array = array();

            $sql = $pdo->prepare("SELECT *,
                            (select categorias.nome from categorias where categorias.id = anuncios.id_categoria) as categoria,
                            (select usuarios.telefone from usuarios where usuarios.id = anuncios.id_usuario) as telefone FROM anuncios WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch();
                $array['fotos'] = array();

                $sql = $pdo->prepare("SELECT id, url FROM anuncios_img WHERE id_anuncio = :id_anuncio");
                $sql->bindValue("id_anuncio",$id);
                $sql->execute(); 

                if($sql->rowCount() > 0){
                    $array['fotos'] = $sql->fetchAll();
                }

            }

            return $array;

        }

        public function editAnuncio($titulo,$categoria,$valor,$descricao,$estado,$fotos,$id){

            global $pdo;

            $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo, id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao, valor = :valor, estado = :estado WHERE id = :id");
            $sql->bindValue(":titulo",$titulo);
            $sql->bindValue(":id_categoria",$categoria);
            $sql->bindValue(":id_usuario",$_SESSION['cLogin']['id']);
            $sql->bindValue(":descricao",$descricao);
            $sql->bindValue(":valor",$valor);
            $sql->bindValue(":estado",$estado);
            $sql->bindValue(":id",$id);
            $sql->execute();

            // verifica se foi enviado alguma foto
            if(count($fotos) > 0){
                for ($i=0; $i < count($fotos['type']); $i++) {
                    //passa a foto para varial arquivo 
                    $tipo = $fotos['type'][$i];
                    // verifica se a foto e do tipo jpeg ou png
                    if(in_array($tipo, array('image/jpeg','image/png'))){
                        //cria a variavel que sera o nome do foto junto com a extensao
                        $tmpname = md5(time().rand(0,9999)).'.jpg';
                        // salva a foto no servidos com nome alterado
                        move_uploaded_file($fotos['tmp_name'][$i],'assets/img/anuncios/'.$tmpname);
                        
                        // REDIMENCINAR A IMAGENS PARA SALVAR TODOS NO TAMANHO PADRAO

                        // busca a imagem que esta salva , pega sua altura original e largura original

                        list($largura_orig, $altura_orig) = getimagesize('assets/img/anuncios/'.$tmpname);

                        $ratio = $largura_orig/$altura_orig;

                        // definindo o tamanho padrao da nova imagem
                        $largura_padrao = 500;
                        $altura_padrao = 500;

                        if($largura_padrao/$altura_padrao > $ratio){
                            $largura_padrao = $altura_padrao * $ratio;
                        }else{
                            $altura_padrao = $largura_padrao/$ratio;
                        }

                        //criando a nova imagem

                        $img = imagecreatetruecolor($largura_padrao, $altura_padrao);

                        //busca a imagem original no servidor e virifica se png ou jpeg e salva na variavel $origi
                        if($tipo == 'image/jpeg'){
                            $origi = imagecreatefromjpeg('assets/img/anuncios/'.$tmpname);
                        }elseif($tipo == 'image/png'){
                            $origi = imagecreatefrompng('assets/img/anuncios/'.$tmpname);
                        }

                        imagecopyresampled($img, $origi, 0,0,0,0, $largura_padrao, $altura_padrao, $largura_orig, $altura_orig);

                        // salvando a nova imagem no servidor e substituindo a original

                        imagejpeg($img,'assets/img/anuncios/'.$tmpname, 80);

                        // salvando o caminho da nova imagem no banco de dados

                        $sql = $pdo->prepare("INSERT INTO anuncios_img SET id_anuncio = :id_anuncio, url = :url");
                        $sql->bindValue(":id_anuncio",$id);
                        $sql->bindValue(":url",$tmpname);
                        $sql->execute();

                    }
                }
            }

        }
    }
?>