<?php

session_start();
include_once('section.php');

$nome = trim($_POST['nome']);
$usuario = trim($_POST['usuario']);
$email = trim($_POST['email']);
$aniversario = trim($_POST['aniversario']);
$senha = trim(md5($_POST['senha']));
$senhar = trim(md5($_POST['senhar']));
$confirmar = trim(md5($_POST['confirmar']));

$testEmail = $_SESSION['email'];
$verifTest = "SELECT * FROM usuarios WHERE email = '$testEmail'";
$pescTest = mysqli_query($link , $verifTest);

$row = $pescTest->fetch_assoc();

$senhaTest = $row['senha'];
$emailTest = $row['email'];
$usuarioTest = $row['email'];

if($confirmar != $senhaTest){
    $confirmarSenha = false;
} else {
    $confirmarSenha = true;
}

$verifEmail = "SELECT * FROM usuarios WHERE email = '$email'";
$verifUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$verifSenha = "SELECT * FROM usuarios WHERE senha = '$confirmar'";

$pescEmail = mysqli_query($link , $verifEmail);
$pescUsuario = mysqli_query($link , $verifUsuario);
$pescSenha = mysqli_query($link , $verifSenha);


if($senha != $senhar) {
    $_SESSION['errosenha'] = "Senhas diferentes!";
    $_SESSION['classerro'] = "erro";
} else {
    $_SESSION['errosenha'] = ""; 
}

if($confirmar != $senhaTest) {
    $_SESSION['erroconfirmar'] = "Senhas errada!";
    $_SESSION['classerro'] = "erro";
    echo('erro');
} else {
    $_SESSION['erroconfirmar'] = ""; 
}

if((mysqli_num_rows($pescEmail) == 1) and ($usuario != $usuarioTest)) {
    $_SESSION['erroemail'] = "Essa email ja usado!";
    $_SESSION['classerroe'] = "erro";
} else {
    $_SESSION['erroemail'] = "";
}

if((mysqli_num_rows($pescUsuario) == 1) and ($email != $emailTest)) {
    $_SESSION['errousuario'] = "Essa email ja usado!";
    $_SESSION['classerrou'] = "erro";
} else {
    $_SESSION['errousuario'] = "";
}

if(($senha == $senhar) and ((mysqli_num_rows($pescEmail) < 1) || ($email == $emailTest)) and ((mysqli_num_rows($pescEmail) == 1) and ($usuario != $usuarioTest)) and ($confirmarSenha == true)){
    
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



    if($sucesso) {
        
        if($senha != "d41d8cd98f00b204e9800998ecf8427e") {
            $sql = "UPDATE usuarios SET nome='$nome',aniversario='$aniversario',usuario='$usuario',email='$email',senha='$senha',`foto`='$nomeImagem',`pasta`='$local' WHERE email = '$testEmail'";
        } else {
            $sql = "UPDATE usuarios SET nome='$nome',aniversario='$aniversario',usuario='$usuario',email='$email',`foto`='$nomeImagem',`pasta`='$local' WHERE email = '$testEmail'";
        }

        mysqli_query($link, $sql);

        unset($_SESSION['errousuario']);
        unset($_SESSION['erroemail']);
        unset($_SESSION['errosenha']);
        unset($_SESSION['erroconfirmar']);
        unset($_SESSION['classerrou']);
    } else {
        
        if($senha != "d41d8cd98f00b204e9800998ecf8427e") {
            $sql = "UPDATE usuarios SET nome='$nome',aniversario='$aniversario',usuario='$usuario',email='$email',senha='$senha' WHERE email = '$testEmail'";
        } else {
            $sql = "UPDATE usuarios SET nome='$nome',aniversario='$aniversario',usuario='$usuario',email='$email' WHERE email = '$testEmail'";
        }

        mysqli_query($link, $sql);

        unset($_SESSION['errousuario']);
        unset($_SESSION['erroemail']);
        unset($_SESSION['errosenha']);
        unset($_SESSION['erroconfirmar']);
        unset($_SESSION['classerrou']);
    }

    

    header('Location: sistema.php');

} else {
    header('Location: editor.php');
}

?>