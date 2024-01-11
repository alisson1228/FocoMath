<?php

session_start();
error_reporting(0);
include_once('section.php');

$nome = trim($_POST['nome']);
$usuario = trim($_POST['usuario']);
$email = trim($_POST['email']);
$aniversario = trim($_POST['aniversario']);
$senha = trim(md5($_POST['senha']));
$senhar = trim(md5($_POST['senhar']));
$nivel = trim($_POST['nivel']);

$verifEmail = "SELECT * FROM usuarios WHERE email = '$email'";
$verifUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$sql = "INSERT INTO usuarios(nome,aniversario,usuario,email,senha) VALUE ('$nome','$aniversario','$usuario','$email','$senha')";

$pescEmail = mysqli_query($link , $verifEmail);
$pescUsuario = mysqli_query($link , $verifUsuario);

if($senha != $senhar) {
    $_SESSION['errosenha'] = "Senhas diferentes!";
    $_SESSION['classerro'] = "erro";
} else {
    $_SESSION['errosenha'] = ""; 
}

if(mysqli_num_rows($pescEmail) == 1) {
    $_SESSION['erroemail'] = "Essa email ja usado!";
    $_SESSION['classerroe'] = "erro";
} else {
    $_SESSION['erroemail'] = "";
}

if(mysqli_num_rows($pescUsuario) == 1) {
    $_SESSION['errousuario'] = "Essa email ja usado!";
    $_SESSION['classerrou'] = "erro";
} else {
    $_SESSION['errousuario'] = "";
}

if(($senha == $senhar) and (mysqli_num_rows($pescEmail) < 1) and (mysqli_num_rows($pescUsuario) < 1)){
    
    $imagem = $_FILES['imagem'];
    $pasta = "perfil/";
    $nomeOriginal = $imagem['name'];
    $nomeImagem = uniqid();
    $extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

    if($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png" && $extensao != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    $local = $pasta . $nomeImagem . "." . $extensao;

    $sucesso = move_uploaded_file($imagem['tmp_name'], $local);

    echo("erro4");

    if($sucesso) {
        $sql = "INSERT INTO usuarios(nome,aniversario,usuario,email,senha,foto,pasta,nivel) VALUE ('$nome','$aniversario','$usuario','$email','$senha','$nomeImagem','$local','$nivel')";

        mysqli_query($link, $sql);

        unset($_SESSION['errousuario']);
        unset($_SESSION['erroemail']);
        unset($_SESSION['errosenha']);
        unset($_SESSION['classerrou']);
    } else {
        $sql = "INSERT INTO usuarios(nome,aniversario,usuario,email,senha,nivel) VALUE ('$nome','$aniversario','$usuario','$email','$senha','$nivel')";

        mysqli_query($link, $sql);

        unset($_SESSION['errousuario']);
        unset($_SESSION['erroemail']);
        unset($_SESSION['errosenha']);
        unset($_SESSION['classerrou']);
    }

    

    header('Location: login.php');

} else {
    header('Location: cadastro.php');
}

?>