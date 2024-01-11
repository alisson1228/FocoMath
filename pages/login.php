<?php 

session_start();
error_reporting(0);
include('section.php');

if($_SESSION['errologin'] != "") {
    $erroLogin = $_SESSION['errologin'];
    $classErro = $_SESSION['classerro'];
}




?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-login.css">
    <title>FocoMath - Login</title>
</head>
<body>
    <header>
        <h1 id="logo">FocoMath</h1>
    </header>

    <main>
        
        <div class="entrada">
            
            <div class="name">
                <h2>Login</h2>
            </div>

            <p class="<?php echo($classErro); ?>"><?php echo($erroLogin); ?></p>

            <form action="../services/testLogin.php" method="POST">
                <label for="email">Seu email:</label>
                <input type="email" id="email" name="email">
                <label for="senha">Sua senha:</label>
                <input type="password" id="senha" name="senha">
                
                <p class="enviar">
                    <button type="submit" name="submit" id="submit" value="submit">entrar</button>
                    <a href="../services/cadastro.php">Não tenho uma conta!</a>
                </p>
                
            </form>
        </div>
        
    </main>
</body>
</html>

<?php 

    unset($_SESSION['errologin']);
    unset($_SESSION['classerro']);

?>