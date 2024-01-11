<?php

session_start();

if(isset($_POST['submit'])) {

    include_once('../services/section.php');
    $email = (trim($_POST['email']));
    $senha = (trim(md5($_POST['senha'])));

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $result = mysqli_query($link , $sql);

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) == 1) {
        
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['nivel'] = $row['nivel'];
        unset($_SESSION['classerro']);
        unset($_SESSION['errologin']);

        header('Location: ../pages/sistema.php');

    } else {
        
        $_SESSION['errologin'] = "Email ou Senha incorreto!";
        $_SESSION['classerro'] = "erro";

        header('Location: ../pages/login.php');

    }

} else {

    if((isset($_SESSION['email']) == true) && (isset($_SESSION['senha'])) == true) {
        
        include_once('../services/section.php');
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];

        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

        $result = mysqli_query($link , $sql);

        $row = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result) == 1) {
            
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            unset($_SESSION['classerro']);
            unset($_SESSION['errologin']);

            header('Location: ../pages/sistema.php');

        } else {
            
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

            header('Location: ../pages/index.php');

        }

    }
}

?>