<?php
    class Anuncios{


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
    }
?>