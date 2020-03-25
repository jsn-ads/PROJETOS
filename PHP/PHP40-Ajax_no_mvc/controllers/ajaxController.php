<?php
    // classe reponsavel por carregar os models e views
    class ajaxController extends controller {

        //chama função loadview do controller passando o nome da view no parametro
        public function index(){
          
          $dados = array(
              'frase' => ''
          );

          if(isset($_POST['nome']) && !empty($_POST['nome'])){

              $nome = addslashes($_POST['nome']);

              $dados['frase'] = "meu nome e ".$nome;
          }

          echo json_encode($dados);

          exit;

          // $this->loadTemplate('ajax', $dados);
        }
    }
?>