<?php

    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $databasa = 'focomath';

    $link = mysqli_connect($host, $usuario, $senha, $databasa);
    if (!$link) {
        die('Não foi possível conectar: ' . mysql_error());
    }

?>