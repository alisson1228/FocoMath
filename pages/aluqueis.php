<?php 

    session_start();
    include_once('config.php');

    if(!empty($_GET['pesquisa']))
    {
        $data = $_GET['pesquisa'];
        $sql = "SELECT * FROM aluguel WHERE pid LIKE '%$data%' or nome LIKE '%$data%' ORDER BY vaid DESC";
        $result1 = mysqli_query($conexao , $sql);

        $row = $result1->fetch_assoc();
    }
    else
    {
        $sql = "SELECT * FROM aluguel ORDER BY pid DESC";

        $result1 = mysqli_query($conexao , $sql);

        $row = $result1->fetch_assoc();
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include('extrutura/head.php') ?>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/aluqueis.css">
    <title>Destaque</title>
</head>
<body>
    
    <?php include('extrutura/header.php') ?>

    <main>

    <div class="pesquisa">
        <input type="text" name="pesquisa" id="pesquisa" class="pesquisar" placeholder="Pesquisa">
        <button onclick="pesqData()" class="btn-pesquisa"><ion-icon name="search-outline"></ion-icon></button>
    </div>

    <?php 
        if(!isset($row)) {
            echo("<div id='nada'><p>Nenhum item foi encontrado!</p></div>");
        };
    ?>

    <div class="pdfs">
    
    <?php 
        $l = 0;

        foreach($result1 as $produto) { $l++ ?>

            <div class="card">
                <img src="imagens/<?php echo($produto['imagem']) ?>" alt="" class="img">
                
                <div>
                    <p class="nome" ><?php echo($produto['nome']) ?></p>
                    <p>R$ <?php echo($produto['preco']) ?> / inic</p>
                </div>
                
                
                <div class="botoes">
                
                    <a id="ler<?php echo($l) ?>" class="ler btn">
                        <ion-icon style="font-size: 25px" name="film-outline"></ion-icon>
                        <p>Detalhes</p>
                    </a>
                </div>
            </div>

            <div id="leitor<?php echo($l) ?>" class="leitor">
                <div id="fechar<?php echo($l) ?>" class="fechar">
                    <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>    
                </div>
                
                <iframe style="display: none" class="apresentar" id="apresentar<?php echo($l) ?>" src="https://www.youtube.com/embed/<?php echo($video['link']) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

                <div id="carregar<?php echo($l) ?>" class="carregar">
                    <div id="carrega"></div>
                    <div id="carrega2"></div>
                </div>
                
            </div>

            <script>
                const ler<?php echo($l) ?> = document.getElementById('ler<?php echo($l) ?>');
                const leitor<?php echo($l) ?> = document.getElementById('leitor<?php echo($l) ?>');
                const apresentar<?php echo($l) ?> = document.getElementById('apresentar<?php echo($l) ?>');
                const fechar<?php echo($l) ?> = document.getElementById('fechar<?php echo($l) ?>');
                

                ler<?php echo($l) ?>.addEventListener("click", evento<?php echo($l) ?> => {
                    leitor<?php echo($l) ?>.style.display = "flex";
                    apresentar<?php echo($l) ?>.src = "https://www.youtube.com/embed/<?php echo($video['link']) ?>?autoplay=1"
                })
                
                fechar<?php echo($l) ?>.addEventListener("click", even<?php echo($l) ?> => {
                    leitor<?php echo($l) ?>.style.display = "none";
                    apresentar<?php echo($l) ?>.src = "https://www.youtube.com/embed/<?php echo($video['link']) ?>"
                })


                const carregar<?php echo($l) ?> = document.getElementById('carregar<?php echo($l) ?>');
                const video<?php echo($l) ?> = document.getElementById('apresentar<?php echo($l) ?>');

                video<?php echo($l) ?>.addEventListener("load", () => {
                    video<?php echo($l) ?>.style.display = "flex";
                    carregar<?php echo($l) ?>.style.display = "none";
                })

            </script>

        <?php }

    ?>

</div>



<script>
    const pesquisa = document.getElementById('pesquisa');
    
    
    //const baixar = document.getElementById('baixar');

    
    pesquisa.addEventListener("keydown", event => {
        if(event.key === "Enter") {
            pesqData();
        }
    })

    function pesqData() {
        window.location.search = "?pesquisa="+pesquisa.value;
    }

</script>

        <div >
            
        

        </div>
    
    </main>

    <script src="script/script-carrossel.js"></script>

</body>
</html>