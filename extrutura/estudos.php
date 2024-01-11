<div class="baner">

    <picture style="width: 100%">
        <source srcset="../img/home/baner.jpg" media="(min-width: 800px)">
        <source srcset="../img/home/baner2.jpeg" media="(max-width: 799px)">
        <img style="width: 100%" src="baner.jpg">
    </picture>

</div>

<div class="estudo">
            
    <!--<a href="pages/abas.php?tipos=quiz">
        <div class="mconquistas botao">
            <h2>Minhas<br>Conquistas</h2>
        </div>
    </a>-->

    <a href="../pages/abas.php?tipos=pdfs&tipo=material-estruturado">
        <div class="mtdestudo botao">
            <h2>Material<br>Estruturado</h2>
        </div>
    </a>

    <a href="../pages/abas.php?tipos=video">
        <div class="aulas botao">
            <h2>Video Aulas</h2>
        </div>
    </a>

    <a href="../pages/abas.php?tipos=questoes">
        <div class="sisedu botao">
            <h2>Quiz</h2>
        </div>
    </a>

    <a href="../pages/abas.php?tipos=pdfs&tipo=enem">
        <div class="enem botao">
            <h2>Enem</h2>
        </div>
    </a>


    <a href="../pages/abas.php?tipos=pdfs&tipo=spaece">
        <div class="spaece botao">
            <h2>SPAECE</h2>
        </div>
    </a>

    <?php 
    
        if(isset($_SESSION['nivel'])) {
            if($_SESSION['nivel'] == 1 || $_SESSION['nivel'] == 3) { ?>

                <a href="../pages/abas.php?tipos=enviaveis">
                    <div class="enviaveis botao">
                        <h2>Enviar</h2>
                    </div>
                </a>

            <?php }
        }

    ?>

</div>