<?php

session_start();
error_reporting();
include_once('section.php');

$titulo = trim($_POST['titulo']);
$qsId = uniqid();

$pasta = "img/";

$contQuest1 = trim($_POST['question1']);
$qId1 = uniqid();

//print_r($_FILES['imagem1']);

if(isset($_FILES['imagem1'])){
    $imagem1 = $_FILES['imagem1'];
    $iId1 = uniqid();
    $nomeOriginal1 = $imagem1['name'];
    $nomeImagem1 = $iId1;
    $extensao1 = strtolower(pathinfo($nomeOriginal1, PATHINFO_EXTENSION));
    $local1 = $pasta . $nomeImagem1 . "." . $extensao1;
}

$contAlterA1 = trim($_POST['contAlterA1']);
$AlterA1 = uniqid();
$contAlterB1 = trim($_POST['contAlterB1']);
$AlterB1 = uniqid();
$contAlterC1 = trim($_POST['contAlterC1']);
$AlterC1 = uniqid();
$contAlterD1 = trim($_POST['contAlterD1']);
$AlterD1 = uniqid();

$alterCerta1 = trim($_POST['alter1']);



$contQuest2 = trim($_POST['question2']);
$qId2 = uniqid();

if(isset($_FILES['imagem2'])){
    $imagem2 = $_FILES['imagem2'];
    $iId2 = uniqid();
    $nomeOriginal2 = $imagem2['name'];
    $nomeImagem2 = $iId2;
    $extensao2 = strtolower(pathinfo($nomeOriginal2, PATHINFO_EXTENSION));
    $local2 = $pasta . $nomeImagem2 . "." . $extensao2;
}

$contAlterA2 = trim($_POST['contAlterA2']);
$AlterA2 = uniqid();
$contAlterB2 = trim($_POST['contAlterB2']);
$AlterB2 = uniqid();
$contAlterC2 = trim($_POST['contAlterC2']);
$AlterC2 = uniqid();
$contAlterD2 = trim($_POST['contAlterD2']);
$AlterD2 = uniqid();

$alterCerta2 = trim($_POST['alter2']);



$contQuest3 = trim($_POST['question3']);
$qId3 = uniqid();

if(isset($_FILES['imagem3'])){
    $imagem3 = $_FILES['imagem3'];
    $iId3 = uniqid();
    $nomeOriginal3 = $imagem3['name'];
    $nomeImagem3 = $iId3;
    $extensao3 = strtolower(pathinfo($nomeOriginal3, PATHINFO_EXTENSION));
    $local3 = $pasta . $nomeImagem3 . "." . $extensao3;
}

$contAlterA3 = trim($_POST['contAlterA3']);
$AlterA3 = uniqid();
$contAlterB3 = trim($_POST['contAlterB3']);
$AlterB3 = uniqid();
$contAlterC3 = trim($_POST['contAlterC3']);
$AlterC3 = uniqid();
$contAlterD3 = trim($_POST['contAlterD3']);
$AlterD3 = uniqid();

$alterCerta3 = trim($_POST['alter3']);



$contQuest4 = trim($_POST['question4']);
$qId4 = uniqid();

if(isset($_FILES['imagem4'])){
    $imagem4 = $_FILES['imagem4'];
    $iId4 = uniqid();
    $nomeOriginal4 = $imagem4['name'];
    $nomeImagem4 = $iId4;
    $extensao4 = strtolower(pathinfo($nomeOriginal4, PATHINFO_EXTENSION));
    $local4 = $pasta . $nomeImagem4 . "." . $extensao4;
}

$contAlterA4 = trim($_POST['contAlterA4']);
$AlterA4 = uniqid();
$contAlterB4 = trim($_POST['contAlterB4']);
$AlterB4 = uniqid();
$contAlterC4 = trim($_POST['contAlterC4']);
$AlterC4 = uniqid();
$contAlterD4 = trim($_POST['contAlterD4']);
$AlterD4 = uniqid();

$alterCerta4 = trim($_POST['alter4']);



$contQuest5 = trim($_POST['question5']);
$qId5 = uniqid();

if(isset($_FILES['imagem5'])){
    $imagem5 = $_FILES['imagem5'];
    $iId5 = uniqid();
    $nomeOriginal5 = $imagem5['name'];
    $nomeImagem5 = $iId5;
    $extensao5 = strtolower(pathinfo($nomeOriginal5, PATHINFO_EXTENSION));
    $local5 = $pasta . $nomeImagem5 . "." . $extensao5;
}

$contAlterA5 = trim($_POST['contAlterA5']);
$AlterA5 = uniqid();
$contAlterB5 = trim($_POST['contAlterB5']);
$AlterB5 = uniqid();
$contAlterC5 = trim($_POST['contAlterC5']);
$AlterC5 = uniqid();
$contAlterD5 = trim($_POST['contAlterD5']);
$AlterD5 = uniqid();

$alterCerta5 = trim($_POST['alter5']);



$verifTitulo = "SELECT * FROM questoes WHERE conteudo = '$titulo'";

$pescTitulo = mysqli_query($link , $verifTitulo);

if(mysqli_num_rows($pescTitulo) == 1) {
    $_SESSION['erroemail'] = "Essa email ja usado!";
    $_SESSION['classerroe'] = "erro";
} else {
    $_SESSION['erroemail'] = "";
}

if(mysqli_num_rows($pescTitulo) < 1){

    if($extensao1 != "jpg" && $extensao1 != "jpeg" && $extensao1 != "png" && $extensao1 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao2 != "jpg" && $extensao2 != "jpeg" && $extensao2 != "png" && $extensao2 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao3 != "jpg" && $extensao3 != "jpeg" && $extensao3 != "png" && $extensao3 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao4 != "jpg" && $extensao4 != "jpeg" && $extensao4 != "png" && $extensao4 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao5 != "jpg" && $extensao5 != "jpeg" && $extensao5 != "png" && $extensao5 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($imagem1['size'] > 0){
        $sucesso1 = move_uploaded_file($imagem1['tmp_name'], $local1);
    
        if($sucesso1) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId1','$qId1','$local1')";
    
            mysqli_query($link, $sql);
        }
    
    }
    
    if($imagem2['size'] > 0){
        $sucesso2 = move_uploaded_file($imagem2['tmp_name'], $local2);

        if($sucesso2) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId2','$qId2','$local2')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem3['size'] > 0){
        $sucesso3 = move_uploaded_file($imagem3['tmp_name'], $local3);

        if($sucesso3) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId3','$qId3','$local3')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem4['size'] > 0){
        $sucesso4 = move_uploaded_file($imagem4['tmp_name'], $local4);

        if($sucesso4) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId4','$qId4','$local4')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem5['size'] > 0){
        $sucesso5 = move_uploaded_file($imagem5['tmp_name'], $local5);

        if($sucesso5) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId5','$qId5','$local5')";

            mysqli_query($link, $sql);
        }

    }


    $sqlQs = "INSERT INTO questoes(qsid,conteudo) VALUE ('$qsId','$titulo')";

    mysqli_query($link, $sqlQs);


    $sqlQ1 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId1','$qsId','$contQuest1')";

    $sqlAA1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA1','$qId1','$contAlterA1')";
    $sqlAB1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB1','$qId1','$contAlterB1')";
    $sqlAC1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC1','$qId1','$contAlterC1')";
    $sqlAD1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD1','$qId1','$contAlterD1')";

    $sqlAce1 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId1','$alterCerta1')";

    
    mysqli_query($link, $sqlQ1);
    mysqli_query($link, $sqlAA1);
    mysqli_query($link, $sqlAB1);
    mysqli_query($link, $sqlAC1);
    mysqli_query($link, $sqlAD1);
    mysqli_query($link, $sqlAce1);



    $sqlQ2 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId2','$qsId','$contQuest2')";

    $sqlAA2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA2','$qId2','$contAlterA2')";
    $sqlAB2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB2','$qId2','$contAlterB2')";
    $sqlAC2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC2','$qId2','$contAlterC2')";
    $sqlAD2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD2','$qId2','$contAlterD2')";

    $sqlAce2 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId2','$alterCerta2')";


    mysqli_query($link, $sqlQ2);
    mysqli_query($link, $sqlAA2);
    mysqli_query($link, $sqlAB2);
    mysqli_query($link, $sqlAC2);
    mysqli_query($link, $sqlAD2);
    mysqli_query($link, $sqlAce2);



    $sqlQ3 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId3','$qsId','$contQuest3')";

    $sqlAA3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA3','$qId3','$contAlterA3')";
    $sqlAB3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB3','$qId3','$contAlterB3')";
    $sqlAC3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC3','$qId3','$contAlterC3')";
    $sqlAD3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD3','$qId3','$contAlterD3')";

    $sqlAce3 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId3','$alterCerta3')";


    mysqli_query($link, $sqlQ3);
    mysqli_query($link, $sqlAA3);
    mysqli_query($link, $sqlAB3);
    mysqli_query($link, $sqlAC3);
    mysqli_query($link, $sqlAD3);
    mysqli_query($link, $sqlAce3);


    $sqlQ4 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId4','$qsId','$contQuest4')";

    $sqlAA4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA4','$qId4','$contAlterA4')";
    $sqlAB4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB4','$qId4','$contAlterB4')";
    $sqlAC4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC4','$qId4','$contAlterC4')";
    $sqlAD4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD4','$qId4','$contAlterD4')";

    $sqlAce4 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId4','$alterCerta4')";


    mysqli_query($link, $sqlQ4);
    mysqli_query($link, $sqlAA4);
    mysqli_query($link, $sqlAB4);
    mysqli_query($link, $sqlAC4);
    mysqli_query($link, $sqlAD4);
    mysqli_query($link, $sqlAce4);


    $sqlQ5 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId5','$qsId','$contQuest5')";

    $sqlAA5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA5','$qId5','$contAlterA5')";
    $sqlAB5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB5','$qId5','$contAlterB5')";
    $sqlAC5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC5','$qId5','$contAlterC5')";
    $sqlAD5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD5','$qId5','$contAlterD5')";

    $sqlAce5 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId5','$alterCerta5')";


    mysqli_query($link, $sqlQ5);
    mysqli_query($link, $sqlAA5);
    mysqli_query($link, $sqlAB5);
    mysqli_query($link, $sqlAC5);
    mysqli_query($link, $sqlAD5);
    mysqli_query($link, $sqlAce5);


    header('Location: enviar.php');

} else {
    header('Location: enviar.php');
}

?><?php

session_start();
error_reporting();
include_once('section.php');

$titulo = trim($_POST['titulo']);
$qsId = uniqid();

$pasta = "img/";

$contQuest1 = trim($_POST['question1']);
$qId1 = uniqid();

//print_r($_FILES['imagem1']);

if(isset($_FILES['imagem1'])){
    $imagem1 = $_FILES['imagem1'];
    $iId1 = uniqid();
    $nomeOriginal1 = $imagem1['name'];
    $nomeImagem1 = $iId1;
    $extensao1 = strtolower(pathinfo($nomeOriginal1, PATHINFO_EXTENSION));
    $local1 = $pasta . $nomeImagem1 . "." . $extensao1;
}

$contAlterA1 = trim($_POST['contAlterA1']);
$AlterA1 = uniqid();
$contAlterB1 = trim($_POST['contAlterB1']);
$AlterB1 = uniqid();
$contAlterC1 = trim($_POST['contAlterC1']);
$AlterC1 = uniqid();
$contAlterD1 = trim($_POST['contAlterD1']);
$AlterD1 = uniqid();

$alterCerta1 = trim($_POST['alter1']);



$contQuest2 = trim($_POST['question2']);
$qId2 = uniqid();

if(isset($_FILES['imagem2'])){
    $imagem2 = $_FILES['imagem2'];
    $iId2 = uniqid();
    $nomeOriginal2 = $imagem2['name'];
    $nomeImagem2 = $iId2;
    $extensao2 = strtolower(pathinfo($nomeOriginal2, PATHINFO_EXTENSION));
    $local2 = $pasta . $nomeImagem2 . "." . $extensao2;
}

$contAlterA2 = trim($_POST['contAlterA2']);
$AlterA2 = uniqid();
$contAlterB2 = trim($_POST['contAlterB2']);
$AlterB2 = uniqid();
$contAlterC2 = trim($_POST['contAlterC2']);
$AlterC2 = uniqid();
$contAlterD2 = trim($_POST['contAlterD2']);
$AlterD2 = uniqid();

$alterCerta2 = trim($_POST['alter2']);



$contQuest3 = trim($_POST['question3']);
$qId3 = uniqid();

if(isset($_FILES['imagem3'])){
    $imagem3 = $_FILES['imagem3'];
    $iId3 = uniqid();
    $nomeOriginal3 = $imagem3['name'];
    $nomeImagem3 = $iId3;
    $extensao3 = strtolower(pathinfo($nomeOriginal3, PATHINFO_EXTENSION));
    $local3 = $pasta . $nomeImagem3 . "." . $extensao3;
}

$contAlterA3 = trim($_POST['contAlterA3']);
$AlterA3 = uniqid();
$contAlterB3 = trim($_POST['contAlterB3']);
$AlterB3 = uniqid();
$contAlterC3 = trim($_POST['contAlterC3']);
$AlterC3 = uniqid();
$contAlterD3 = trim($_POST['contAlterD3']);
$AlterD3 = uniqid();

$alterCerta3 = trim($_POST['alter3']);



$contQuest4 = trim($_POST['question4']);
$qId4 = uniqid();

if(isset($_FILES['imagem4'])){
    $imagem4 = $_FILES['imagem4'];
    $iId4 = uniqid();
    $nomeOriginal4 = $imagem4['name'];
    $nomeImagem4 = $iId4;
    $extensao4 = strtolower(pathinfo($nomeOriginal4, PATHINFO_EXTENSION));
    $local4 = $pasta . $nomeImagem4 . "." . $extensao4;
}

$contAlterA4 = trim($_POST['contAlterA4']);
$AlterA4 = uniqid();
$contAlterB4 = trim($_POST['contAlterB4']);
$AlterB4 = uniqid();
$contAlterC4 = trim($_POST['contAlterC4']);
$AlterC4 = uniqid();
$contAlterD4 = trim($_POST['contAlterD4']);
$AlterD4 = uniqid();

$alterCerta4 = trim($_POST['alter4']);



$contQuest5 = trim($_POST['question5']);
$qId5 = uniqid();

if(isset($_FILES['imagem5'])){
    $imagem5 = $_FILES['imagem5'];
    $iId5 = uniqid();
    $nomeOriginal5 = $imagem5['name'];
    $nomeImagem5 = $iId5;
    $extensao5 = strtolower(pathinfo($nomeOriginal5, PATHINFO_EXTENSION));
    $local5 = $pasta . $nomeImagem5 . "." . $extensao5;
}

$contAlterA5 = trim($_POST['contAlterA5']);
$AlterA5 = uniqid();
$contAlterB5 = trim($_POST['contAlterB5']);
$AlterB5 = uniqid();
$contAlterC5 = trim($_POST['contAlterC5']);
$AlterC5 = uniqid();
$contAlterD5 = trim($_POST['contAlterD5']);
$AlterD5 = uniqid();

$alterCerta5 = trim($_POST['alter5']);



$verifTitulo = "SELECT * FROM questoes WHERE conteudo = '$titulo'";

$pescTitulo = mysqli_query($link , $verifTitulo);

if(mysqli_num_rows($pescTitulo) == 1) {
    $_SESSION['erroemail'] = "Essa email ja usado!";
    $_SESSION['classerroe'] = "erro";
} else {
    $_SESSION['erroemail'] = "";
}

if(mysqli_num_rows($pescTitulo) < 1){

    if($extensao1 != "jpg" && $extensao1 != "jpeg" && $extensao1 != "png" && $extensao1 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao2 != "jpg" && $extensao2 != "jpeg" && $extensao2 != "png" && $extensao2 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao3 != "jpg" && $extensao3 != "jpeg" && $extensao3 != "png" && $extensao3 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao4 != "jpg" && $extensao4 != "jpeg" && $extensao4 != "png" && $extensao4 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($extensao5 != "jpg" && $extensao5 != "jpeg" && $extensao5 != "png" && $extensao5 != "gif") {
        $_SESSION['erroextencao'] = "Essa extenção não é aceita!";
        $_SESSION['classerrou'] = "erro";
    }

    if($imagem1['size'] > 0){
        $sucesso1 = move_uploaded_file($imagem1['tmp_name'], $local1);
    
        if($sucesso1) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId1','$qId1','$local1')";
    
            mysqli_query($link, $sql);
        }
    
    }
    
    if($imagem2['size'] > 0){
        $sucesso2 = move_uploaded_file($imagem2['tmp_name'], $local2);

        if($sucesso2) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId2','$qId2','$local2')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem3['size'] > 0){
        $sucesso3 = move_uploaded_file($imagem3['tmp_name'], $local3);

        if($sucesso3) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId3','$qId3','$local3')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem4['size'] > 0){
        $sucesso4 = move_uploaded_file($imagem4['tmp_name'], $local4);

        if($sucesso4) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId4','$qId4','$local4')";

            mysqli_query($link, $sql);
        }

    } 

    if($imagem5['size'] > 0){
        $sucesso5 = move_uploaded_file($imagem5['tmp_name'], $local5);

        if($sucesso5) {
            $sql = "INSERT INTO imgq(imgid,qid,pasta) VALUE ('$iId5','$qId5','$local5')";

            mysqli_query($link, $sql);
        }

    }


    $sqlQs = "INSERT INTO questoes(qsid,conteudo) VALUE ('$qsId','$titulo')";

    mysqli_query($link, $sqlQs);


    $sqlQ1 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId1','$qsId','$contQuest1')";

    $sqlAA1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA1','$qId1','$contAlterA1')";
    $sqlAB1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB1','$qId1','$contAlterB1')";
    $sqlAC1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC1','$qId1','$contAlterC1')";
    $sqlAD1 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD1','$qId1','$contAlterD1')";

    $sqlAce1 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId1','$alterCerta1')";

    
    mysqli_query($link, $sqlQ1);
    mysqli_query($link, $sqlAA1);
    mysqli_query($link, $sqlAB1);
    mysqli_query($link, $sqlAC1);
    mysqli_query($link, $sqlAD1);
    mysqli_query($link, $sqlAce1);



    $sqlQ2 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId2','$qsId','$contQuest2')";

    $sqlAA2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA2','$qId2','$contAlterA2')";
    $sqlAB2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB2','$qId2','$contAlterB2')";
    $sqlAC2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC2','$qId2','$contAlterC2')";
    $sqlAD2 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD2','$qId2','$contAlterD2')";

    $sqlAce2 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId2','$alterCerta2')";


    mysqli_query($link, $sqlQ2);
    mysqli_query($link, $sqlAA2);
    mysqli_query($link, $sqlAB2);
    mysqli_query($link, $sqlAC2);
    mysqli_query($link, $sqlAD2);
    mysqli_query($link, $sqlAce2);



    $sqlQ3 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId3','$qsId','$contQuest3')";

    $sqlAA3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA3','$qId3','$contAlterA3')";
    $sqlAB3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB3','$qId3','$contAlterB3')";
    $sqlAC3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC3','$qId3','$contAlterC3')";
    $sqlAD3 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD3','$qId3','$contAlterD3')";

    $sqlAce3 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId3','$alterCerta3')";


    mysqli_query($link, $sqlQ3);
    mysqli_query($link, $sqlAA3);
    mysqli_query($link, $sqlAB3);
    mysqli_query($link, $sqlAC3);
    mysqli_query($link, $sqlAD3);
    mysqli_query($link, $sqlAce3);


    $sqlQ4 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId4','$qsId','$contQuest4')";

    $sqlAA4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA4','$qId4','$contAlterA4')";
    $sqlAB4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB4','$qId4','$contAlterB4')";
    $sqlAC4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC4','$qId4','$contAlterC4')";
    $sqlAD4 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD4','$qId4','$contAlterD4')";

    $sqlAce4 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId4','$alterCerta4')";


    mysqli_query($link, $sqlQ4);
    mysqli_query($link, $sqlAA4);
    mysqli_query($link, $sqlAB4);
    mysqli_query($link, $sqlAC4);
    mysqli_query($link, $sqlAD4);
    mysqli_query($link, $sqlAce4);


    $sqlQ5 = "INSERT INTO questao(qid,qsid,conteudo) VALUE ('$qId5','$qsId','$contQuest5')";

    $sqlAA5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterA5','$qId5','$contAlterA5')";
    $sqlAB5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterB5','$qId5','$contAlterB5')";
    $sqlAC5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterC5','$qId5','$contAlterC5')";
    $sqlAD5 = "INSERT INTO alternativas(alid,qid,conteudo) VALUE ('$AlterD5','$qId5','$contAlterD5')";

    $sqlAce5 = "INSERT INTO altercerta(qid,resposta) VALUE ('$qId5','$alterCerta5')";


    mysqli_query($link, $sqlQ5);
    mysqli_query($link, $sqlAA5);
    mysqli_query($link, $sqlAB5);
    mysqli_query($link, $sqlAC5);
    mysqli_query($link, $sqlAD5);
    mysqli_query($link, $sqlAce5);


    header('Location: enviar.php');

} else {
    header('Location: enviar.php');
}

?>