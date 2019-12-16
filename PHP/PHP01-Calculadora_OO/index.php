<?php
    include 'calculadora.class.php';
    
    $calculadora = new Calculadora(10);

    $calculadora->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);

    $resultado = $calculadora->resultado();

    echo "Resultado :".$resultado;
?>