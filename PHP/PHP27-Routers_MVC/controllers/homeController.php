<?php
    // classe reponsavel por carregar os models e views
    class HomeController extends controller {

        //chama função loadview do controller passando o nome da view no parametro
        public function index(){
          $viewData = array();
          $this->loadTemplate('home', $viewData);
        }

        public function abrir($valor){
          $viewData = array(
              'valor' => $valor
          );
          $this->loadTemplate('vazio', $viewData);
      }
    }
?>