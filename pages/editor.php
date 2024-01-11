<?php

session_start();
include_once('../services/section.php');

if((isset($_SESSION['email'])) && (isset($_SESSION['senha']))) {
    
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM usuarios WHERE email LIKE '$email'";
    
    $result = mysqli_query($link , $sql);

    $row = $result->fetch_assoc();

} else {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../index.php');
}

if(isset($_SESSION['errousuario'])) {
    $erroUsuario = $_SESSION['errousuario'];
    $classErroU = $_SESSION['classerro'];
}

if(isset($_SESSION['erroemail'])) {
    $erroEmail = $_SESSION['erroemail'];
    $classErroE = $_SESSION['classerro'];
}

if(isset($_SESSION['errosenha'])) {
    $erroSenha = $_SESSION['errosenha'];
    $classErroS = $_SESSION['classerro'];
}

if(isset($_SESSION['erroconfirmar'])) {
    $erroConfirmar = $_SESSION['erroconfirmar'];
    $classErroS = $_SESSION['classerro'];
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-cadastro.css">
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

            <form action="../service/testEditor.php" enctype="multipart/form-data" method="POST">

                <div class="perfil">
                    <img id="perfil" src="../img/<?php echo($row['pasta']) ?>" alt="">
                    <input type="file" name="imagem" id="imagem">
                    <label id="enviar" for="imagem">Adicionar foto de perfil</label>
                </div>    
                
                <label id="label" for="nome">Seu nome completo:</label>
                <input value="<?php echo($row['nome']) ?>" type="text" id="nome" name="nome" required>
                <label id="label" for="nome">Crie seu usuario:</label>
                <input value="<?php echo($row['usuario']) ?>" type="text" id="usuario" name="usuario" maxlength="17" minlength="3" required>
                <?php if(isset($erroUsuario)) { ?><p class="<?php echo($classErroU) ?>"><?php echo($erroUsuario) ?></p><?php } ?>

                <label id="label" for="idade">Sua aniversario:</label>
                <input value="<?php echo($row['aniversario']) ?>" type="date" id="data" name="aniversario" required>
                <label id="label" for="email">Seu email:</label>
                <input value="<?php echo($row['email']) ?>" type="email" id="email" name="email" required>
                <?php if(isset($erroEmail)) { ?><p class="<?php echo($classErroU) ?>"><?php echo($erroUsuario) ?></p><?php } ?>

                <label id="label" for="senha">Nova senha:</label>
                <input type="password" id="senha" name="senha" >
                <label id="label" for="senha-r">Repetir senha:</label>
                <input type="password" id="senhar" name="senhar" >
                <?php if(isset($erroSenha)) { ?><p class="<?php echo($classErroU) ?>"><?php echo($erroUsuario) ?></p><?php } ?>
                <label id="label" for="senha-r">Confirmar senha atual:</label>
                <input type="password" id="senhar" name="confirmar" required>
                <?php if(isset($erroSenha)) { ?><p class="<?php echo($classErroU) ?>"><?php echo($erroConfirmar) ?></p><?php } ?>
                
                <div class="enviar">
                    <button type="submit">Salvar</button>
                </div>
                
            </form>
        </div>
        
    </main>

    <script src="../services/script.js"></script>
</body>
</html>