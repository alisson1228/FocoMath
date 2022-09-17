<?php

error_reporting(0);
include_once('section.php');

$nome = trim($_POST['nome']);
$usuario = trim($_POST['usuario']);
$email = trim($_POST['email']);
$aniversario = trim($_POST['aniversario']);
$senha = trim(md5($_POST['senha']));
$senhar = trim(md5($_POST['senhar']));

$verifEmail = "SELECT * FROM usuarios WHERE email = '$email'";

$verifUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

$sql = "INSERT INTO usuarios(nome,aniversario,usuario,email,senha) VALUE ('$nome','$aniversario','$usuario','$email','$senha')";

$resultEmail = mysqli_query($link , $verifEmail);
$resultUsuario = mysqli_query($link , $verifUsuario);

if(mysqli_num_rows($resultUsuario) < 1){
    
    if(mysqli_num_rows($resultEmail) < 1){
        
        if($senha == $senhar) {
        
            mysqli_query($link , $sql);
        
        } else {
        
            unset($_SESSION['senha']);
            unset($_SESSION['senhar']);
            $erroSenha = 'As senhas estão diferesntes!';
        
        }
    
    } else {
        
        unset($_SESSION['email']);
        $erroEmail = 'Esse email ja esta em uso!';
    
    }

} else {

    $erroUsuario = 'Esse Usuario ja esta em uso!';
    unset($_SESSION['usuario']);

}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-cadastro.css">
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

            <form action="" method="POST">
                
                <label for="nome">Seu nome completo:</label>
                <input type="text" id="nome" name="nome">
                <label for="nome">Crie seu usuario:</label>
                <input type="text" id="usuario" name="usuario">
                <p class="erro"><?php echo($erroUsuario) ?></p>

                <label for="idade">Sua aniversario:</label>
                <input type="date" id="data" name="aniversario" >
                <label for="email">Seu email:</label>
                <input type="email" id="email" name="email">
                <p class="erro"><?php echo($erroEmail) ?></p>

                <label for="senha">Crie uma senha:</label>
                <input type="password" id="senha" name="senha">
                <label for="senha-r">Repetir senha:</label>
                <input type="password" id="senhar" name="senhar">
                <p class="erro"><?php echo($erroSenha) ?></p>
                
                <div class="enviar">
                    <button type="submit">cadastrar</button>
                    <a href="login.php">Ja tenho uma conta!</a>
                </div>
                
            </form>
        </div>
        
    </main>
</body>
</html>