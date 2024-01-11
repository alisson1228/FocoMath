<?php

    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $databasa = 'focomath';

    $link = mysqli_connect($host, $usuario, $senha, $databasa);
    if (!$link) {
        die('Não foi possível conectar: ' . mysqli_connect_error());
    }

    mysqli_set_charset($link,"utf8");

?>