<?php
    
    class Language{

        
        private $l;
        private $ini;
        private $bd;

        //Executa ao iniciar a aplicação
        public function __construct(){

            global $connection;

            $this->l = 'pt-br';

            if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini')){
                $this->l = $_SESSION['lang'];   
            }

            $this->ini = parse_ini_file('lang/'.$this->l.'.ini');

            $sql = "SELECT * FROM lang WHERE lang = :lang";
            $sql = $connection->prepare($sql);
            $sql->bindValue(":lang" , $this->l); 
            $sql->execute();

            if($sql->rowCount() > 0){
                foreach($sql->fetchAll() as $item){
                    $this->bd[$item['nome']] = $item['valor'];
                }
            }


        }

        public function getLanguage(){
            return $this->l;
        }

        public function get($word, $return = false){
            $text = $word;

            if(isset($this->ini[$word])){
                $text = $this->ini[$word];
            } else if(isset($this->bd[$word])){
                $text = $this->bd[$word];
            }

            if($return){
                return $text;
            }else{
                echo $text;
            }
        }

    }
    
?>