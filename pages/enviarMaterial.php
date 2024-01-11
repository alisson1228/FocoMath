<?php

session_start();
error_reporting();
include_once('section.php');

$titulo = trim($_POST['titulo']);

$pasta = "material/";

if(isset($_FILES['imagem'])){
    $imagem = $_FILES['imagem'];
    $iId1 = uniqid();
    $nomeOriginal1 = $imagem['name'];
    $nomeImagem = $iId1;
    $extensao1 = strtolower(pathinfo($nomeOriginal1, PATHINFO_EXTENSION));
    $local1 = $pasta . $nomeImagem . "." . $extensao1;
}

$alterCerta1 = trim($_POST['alter1']);

$verifTitulo = "SELECT * FROM pdf WHERE nome = '$titulo'";

$pescTitulo = mysqli_query($link , $verifTitulo);

if(mysqli_num_rows($pescTitulo) == 1) {
    $_SESSION['erroemail'] = "Essa email ja usado!";
    $_SESSION['classerroe'] = "erro";
} else {
    $_SESSION['erroemail'] = "";
}

if(mysqli_num_rows($pescTitulo) < 1){

    if($extensao1 != "pdf") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($imagem['size'] > 0){
        $sucesso1 = move_uploaded_file($imagem['tmp_name'], $local1);
    
        if($sucesso1) {
            $sql = "INSERT INTO pdf(pdfid,nome,pasta,tipo) VALUE ('$iId1','$titulo','$local1','$alterCerta1')";
    
            mysqli_query($link, $sql);
        } else {
            echo("erro");
        }
    
    }

    //header('Location: enviar.php');

} else {
    //header('Location: enviar.php');

    echo("erro");
}

?>