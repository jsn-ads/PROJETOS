<?php
    // classe reponsavel por carregar os models e views
    class HomeController extends controller {

        //chama função loadview do controller passando o nome da view no parametro
        public function index(){
          $viewData = array();

          $fotos = new Fotos();

          $fotos->saveFotos();

          $viewData['fotos'] = $fotos->getFotos();

          $this->loadTemplate('home', $viewData);
        }
    }
?>