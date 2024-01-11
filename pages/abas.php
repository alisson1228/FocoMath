<?php

session_start();
include_once('../services/section.php');

//if((isset($_SESSION['email']) == true) && (isset($_SESSION['senha'])) == true) {
//    header('Location: testLogin.php');
//}

if(isset($_GET['tipos'])) {
    $_SESSION['tipos'] = $_GET['tipos'];
    $tipos = $_SESSION['tipos'];
} else {
    $tipos = $_SESSION['tipos'];
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
    <link rel="stylesheet" href="../style/style.css?v=1">
    <link rel="stylesheet" href="../style/header.css?v=1">
    <link rel="stylesheet" href="../style/podio.css">
    <!--<link rel="stylesheet" href="style/pdf.css?v=1">
    <link rel="stylesheet" href="style/questoes.css?v=1">-->
    <link rel="stylesheet" href="../style/<?php echo($tipos) ?>.css?v=8">
    
    <title>FocoMath</title>
</head>
<body>
    
    <?php include('../extrutura/header.php'); ?>

    <main>

    <?php include('../extrutura/'.$tipos.'.php'); ?>
        
    </main>

</body>
</html>
