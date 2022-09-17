<?php

    $email = 'alisson13souza@hotmail.com';


    header('Access-Control-Allow-Origin: *');

    $link = mysqli_connect("localhost", "root", "", "login");
    if (!$link) {
        die('Não foi possível conectar: ' . mysql_error());
    }

    $db = mysqli_select_db($link,"login");

    $result=mysqli_query($link, "SELECT * FROM usuario");

   

    while($rows=mysqli_fetch_array($result)){
        echo $rows['usuario_cliente'] . "|" . $rows['usuario_email'] . "|";
    }

    $resulte = mysqli_query($link, "SELECT * FROM usuario WHERE usuario_email = '$email'");

    $row = mysqli_fetch_assoc($resulte);

    if($row == 0) {
        echo "email não existe";
    } else {
        echo "email encontrdo";
    }

    mysqli_close($link);
?>