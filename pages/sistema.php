<?php

session_start();
include_once('../services/section.php');

if((isset($_SESSION['email']) != true) && (isset($_SESSION['senha'])) != true) {
    
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../index.php');

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
    <link rel="stylesheet" href="../style/header.css?v=2">
    <link rel="stylesheet" href="../style/podio.css?v=2">
    <link rel="stylesheet" href="../style/estudos.css?v=8">
    
    <title>FocoMath</title>
</head>
<body>

    <?php include('../extrutura/header.php') ?>

    <main>

        <?php include('../extrutura/estudos.php'); ?>

        <?php include('../extrutura/podio.php'); ?>
    </main>
</body>
</html>
