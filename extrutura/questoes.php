<?php 

    if(!empty($_GET['pesquisa']))
    {
        $data = $_GET['pesquisa'];
        $sql = "SELECT * FROM questoes WHERE qsid LIKE '%$data%' or conteudo LIKE '%$data%' ORDER BY qsid DESC";
        $result1 = mysqli_query($link , $sql);

        $row = $result1->fetch_assoc();
    }
    else
    {
        $sql = "SELECT * FROM questoes ORDER BY qsid DESC";

        $result1 = mysqli_query($link , $sql);

        $row = $result1->fetch_assoc();
    }

?>

<div class="pesquisa">
    <input type="text" name="pesquisa" id="pesquisa" class="pesquisar" placeholder="Pesquisa">
    <button onclick="pesqData()" class="btn-pesquisa"><ion-icon name="search-outline"></ion-icon></button>
</div>

<?php 
    if(!isset($row)) {
        echo("<div id='nada'><p>Nenhum material foi encontrado!</p></div>");
    };
?>

<div class="pdfs">
    
    <?php 
        $l = 0;

        foreach($result1 as $qs) { $l++; ?>

            <div class="pdf">
                <div class="capa">
                    <img src="../img/capas/capa.png" alt="">
                </div>
                <p class="titulo"><?php echo($qs['conteudo']) ?></p>
                <div class="botoes">
                
                    <a id="start" class="ler btn" href="quiz.php?questionario=<?php echo($qs['qsid']) ?>&titulo=<?php echo($qs['conteudo']) ?>">
                        <ion-icon style="font-size: 25px;" name="game-controller-outline"></ion-icon>
                        <p>Start</p>
                    </a>

                </div>
            </div>

        <?php }

    ?>

</div>



<script>
    const pesquisa = document.getElementById('pesquisa');
    
    pesquisa.addEventListener("keydown", event => {
        if(event.key === "Enter") {
            pesqData();
        }
    })

    function pesqData() {
        window.location.search = "?pesquisa="+pesquisa.value;
    }

</script>