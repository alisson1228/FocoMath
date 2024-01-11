<?php

session_start();
error_reporting(0);

if($_SESSION['errousuario'] != "") {
    $erroUsuario = $_SESSION['errousuario'];
    $classErroU = $_SESSION['classerro'];
}

if($_SESSION['erroemail'] != "") {
    $erroEmail = $_SESSION['erroemail'];
    $classErroE = $_SESSION['classerro'];
}

if($_SESSION['errosenha'] != "") {
    $erroSenha = $_SESSION['errosenha'];
    $classErroS = $_SESSION['classerro'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-cadastro.css?v=1">
    <title>FocoMath - Login</title>
</head>
<body>
    <header>
        <h1 id="logo">FocoMath</h1>
    </header>

    <main>
        
        <div class="entrada">
            
            <div class="name">
                <h2>Cadrastro</h2>
            </div>

            <form action="../services/testCadastro.php" enctype="multipart/form-data" method="POST">

                <div class="nivel">
                    <input type="radio" id="aluno" name="nivel" value="2" checked="">

                    <input type="radio" id="professor" name="nivel" value="3">

                    <label for="aluno" class="nivelLabel" id="nl1">Aluno</label>
                    <label for="professor" class="nivelLabel" id="nl2">Professor</label>
            
                </div>

                <div class="perfil">
                    <img id="perfil" src="../img/perfil/foto.png" alt="">
                    <input type="file" name="imagem" id="imagem">
                    <label id="enviar" for="imagem">Adicionar foto de perfil</label>
                </div>    
                
                <label id="label" for="nome">Seu nome completo:</label>
                <input type="text" id="nome" name="nome" required>
                <label id="label" for="nome">Crie seu usuario:</label>
                <input type="text" id="usuario" name="usuario" maxlength="17" minlength="3" required>
                <p class="<?php echo($classErroU) ?>"><?php echo($erroUsuario) ?></p>

                <label id="label" for="idade">Sua aniversario:</label>
                <input type="date" id="data" name="aniversario" required>
                <label id="label" for="email">Seu email:</label>
                <input type="email" id="email" name="email" required>
                <p class="<?php echo($classErroE) ?>"><?php echo($erroEmail) ?></p>

                <label id="label" for="senha">Crie uma senha:</label>
                <input type="password" id="senha" name="senha" required>
                <label id="label" for="senha-r">Repetir senha:</label>
                <input type="password" id="senhar" name="senhar" required>
                <p class="<?php echo($classErroS) ?>"><?php echo($erroSenha) ?></p>
                
                <div class="enviar">
                    <button type="submit">cadastrar</button>
                    <a href="../pages/login.php">Ja tenho uma conta!</a>
                </div>
                
            </form>
        </div>
        
    </main>

    <script src="../services/script.js"></script>
</body>
</html>