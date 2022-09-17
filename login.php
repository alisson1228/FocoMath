<?php 

include('section.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha sua Email!";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario WHERE usuario_email = '$email' AND usuario_senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['usuario_id'];
            $_SESSION['name'] = $usuario['usuario_cliente'];

            header("Location: index.html");

        } else {
            echo "Falha ao logar! email ou senha incorretos";
        }

    }
};

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-login.css">
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

            <form action="">
                <label for="email">Seu email:</label>
                <input type="email" id="email" name="email">
                <label for="senha">Sua senha:</label>
                <input type="password" id="senha" name="senha">
                
                <p class="enviar">
                    <button type="submit">entrar</button>
                    <a href="cadastro.php">Não tenho uma conta!</a>
                </p>
                
            </form>
        </div>
        
    </main>
</body>
</html>