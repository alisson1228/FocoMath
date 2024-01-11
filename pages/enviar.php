<?php

session_start();
include_once('section.php');

//if((isset($_SESSION['email']) == true) && (isset($_SESSION['senha'])) == true) {
//    header('Location: testLogin.php');
//}

if(isset($_GET['enviar'])) {
    $_SESSION['enviar'] = $_GET['enviar'];
    $enviar = $_SESSION['enviar'];
} else {
    $enviar = $_SESSION['enviar'];
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
    <script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@3.0.279/build/pdf.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/podio.css">
    <!--<link rel="stylesheet" href="style/pdf.css?v=1">
    <link rel="stylesheet" href="style/questoes.css?v=1">-->
    <link rel="stylesheet" href="style/enviar-<?php echo($enviar) ?>.css?v=3">
    
    <title>FocoMath</title>
</head>
<body>
    
    <?php include('extrutura/header.php'); ?>

    <main>

    <?php include('extrutura/enviar-'.$enviar.'.php'); ?>
        
    </main>

</body>
</html>
