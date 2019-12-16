<?php 

    function calcular_Patentes($id, $limite){

        global $connection;

        $lista = array();

        $sql = "SELECT * FROM user WHERE id_pai = :id";    
        $sql = $connection->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        $filhos = 0;
        
        if($sql->rowCount() > 0){
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
            $filhos = $sql->rowCount();
            foreach($lista as $chave => $usuario){
                if($limite > 0){
                    $filhos += calcular_Patentes($usuario['id'], $limite-1);
                }
            }
        }

        return $filhos;

    }


    function listar($id, $limite){

        global $connection;

        $lista = array();

        $sql = "SELECT user.id, user.id_pai, user.nome , user.patente, patentes.nome as patente
                FROM user INNER JOIN patentes
                ON user.patente = patentes.id 
                WHERE user.id_pai = :id";
                
        $sql = $connection->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
     
            foreach($lista as $chave => $usuario){
                $lista[$chave]['filhos'] = array();
                if($limite > 0){
                    $lista[$chave]['filhos'] = listar($usuario['id'], $limite-1);
                }
            }
        }

        return $lista;

    }

    function exibir($array){
       echo '<ul>';
            foreach($array as $usuario){
                echo '<li>';
                    echo $usuario['nome'].'('.$usuario['patente'].')';

                    if(count($usuario['filhos']) > 0){
                        exibir($usuario['filhos']);
                    }

                echo '</li>';
            }
       echo '</ul>';
    }
?>