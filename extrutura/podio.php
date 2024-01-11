<?php

$sql = "SELECT * FROM usuarios WHERE nivel LIKE '2' ORDER BY pontos DESC LIMIT 10";
    
$result = mysqli_query($link , $sql);

$row = $result->fetch_assoc()

?>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<div class="ranking">
            
    <div class="podio">
        <h3>Pódio</h3>
        <ion-icon class="podioi" name="podium-outline"></ion-icon>
    </div>

    <?php 

        $p = 0;

        foreach($result as $user_data) {
                
            $p++;

            $usuario = $user_data['usuario'];
            $pontos = number_format($user_data['pontos'], 0 , ",", ".");


            echo("
                <div class='rank r".$p."'>
                    <div class='po p".$p."'>
                        <p>".$p."</p>
                    </div>
                    <div class='name-point'>
                        <p>$usuario</p>
                        <p style='display: flex; align-items: center;'>$pontos <ion-icon name='trophy' role='img' class='md hydrated' aria-label='trophy'></ion-icon></p>
                    </div>
                </div>
            ");
            }
            
    ?>
            
</div>