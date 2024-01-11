<?php 

session_start();

if(isset($_POST['submit'])) {

    
    include_once('section.php');

    $nome = trim($_POST['nome']);
    $video = trim($_POST['link']);
    $id = uniqid();

    if(mb_strlen($video) == 28){
        $vlink = substr($video,17,strlen($video));
    }

    if(mb_strlen($video) == 43){
        $vlink = substr($video,32,strlen($video));
    }

    $verifNome = "SELECT * FROM vaula WHERE nome = '$nome'";
    $sql = "INSERT INTO vaula(vaid, nome, link) VALUES ('$id', '$nome', '$vlink')";

    $pescNome = mysqli_query($link , $verifNome);

    if(mysqli_num_rows($pescNome) >= 1) {
        $_SESSION['erronome'] = "Esse nome ja foi usado!";
        $_SESSION['classerrou'] = "erro";

        header('Location: enviar.php');
    } else {
        $_SESSION['errousuario'] = "";
    }

    if((mysqli_num_rows($pescNome) < 1)){
        
        mysqli_query($link, $sql);

        unset($_SESSION['erronome']);
        unset($_SESSION['classerrou']);

    }

    header('Location: enviar.php');

} else {
    header('Location: enviar.php');
}

?>