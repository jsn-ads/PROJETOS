<?php
    // classe responsavel para personalizar URL
    global $routers;
    $routers = array();
    $routers['/cadastro/{valor}'] = '/cadastro/abrir/:valor';
    $routers['/financeiro/{valor}'] = '/financeiro/abrir/:valor';
    $routers['/relatorio/{valor}'] = '/relatorio/abrir/:valor';
?>