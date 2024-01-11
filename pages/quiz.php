<?php 

    session_start();
    include_once('../services/section.php');

    if((isset($_SESSION['email']) != true) && (isset($_SESSION['senha'])) != true) {
    
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $_SESSION['errologin'] = "Para fazer o Quiz faça login!";
        $_SESSION['classerro'] = "erro";
        header('Location: login.php');
    
    }

    if(!empty($_GET['titulo']))
    {
        $_SESSION['titulo'] = $_GET['titulo'];
        $titulo = $_SESSION['titulo'];
    }
    else
    {
        $titulo = $_SESSION['titulo'];
    }
   
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Quiz - <?php echo($titulo) ?></title>
    <link rel="stylesheet" href="../style/quiz.css?v=3">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/style.css?v=1">
</head>
<body id="body">

    <?php include('../extrutura/header.php'); ?>

    <h3 id="titulo">Quiz de <?php echo($titulo) ?></h3>

    <div id="container">
        <div id="start">Começar!</div>
        <div id="quiz" style="display: none">
            <div id="ques">
                <div id="question"></div>
                <div id="qImg"></div>
            </div>
            <div id="choices">
                <div class="choice" id="A" onclick="checkAnswer('A')">
                    <div id="letra"><p>A</p></div>
                    <div id="alter"></div>
                </div>
                <div class="choice" id="B" onclick="checkAnswer('B')">
                    <div id="alt"><p>A</p></div>
                </div>
                <div class="choice" id="C" onclick="checkAnswer('C')">
                    <div id="alt"><p>A</p></div>
                </div>
                <div class="choice" id="D" onclick="checkAnswer('D')">
                    <div id="alt"><p>A</p></div>
                </div>
            </div>
            <div id="progress"></div>
        </div>

        <div id="scoreContainer" style="display: none;">
            <div id="info-cont">
                <div id="info">
                    <div id="porcent"></div>
                    <div id="pontos"></div>

                    <a id="abotao" href="../pages/abas.php?tipos=questoes">
                    <div id="botao">Concluir</div>
                    </a>

                    <a id="abotao" href="../pages/abas.php?tipos=video&pesquisa=<?php echo($titulo) ?>">
                    <div id="botao">Estudar este topico!</div>
                    </a>
                </div>
            </div>
            
        </div>
    </div>

    <?php include('../services/testquiz.php'); ?>