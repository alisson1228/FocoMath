<?php 

    if(isset($_GET['tipo'])) {
        $_SESSION['tipo'] = $_GET['tipo'];
        $tipo = $_SESSION['tipo'];
    } else {
        $tipo = $_SESSION['tipo'];
    }

    if(!empty($_GET['pesquisa']))
    {
        $data = $_GET['pesquisa'];
        $sql = "SELECT * FROM pdf WHERE pdfid LIKE '%$data%' or nome LIKE '%$data%' and tipo LIKE '$tipo'  ORDER BY pdfid DESC";
        $result1 = mysqli_query($link , $sql);

        $row = $result1->fetch_assoc();
    }
    else
    {
        $sql = "SELECT * FROM pdf WHERE tipo LIKE '$tipo' ORDER BY pdfid DESC";

        $result1 = mysqli_query($link , $sql);

        $row = $result1->fetch_assoc();
    }

?>

<head>
    <script src="../pdfjs-dist/build/pdf.js"></script>
</head>

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

        foreach($result1 as $pdf) { $l++ ?>

            <div class="pdf">
                <div class="capa">
                    <img src="../img/capas/capa.png" alt="">
                </div>
                <p class="titulo"><?php echo($pdf['nome']) ?></p>
                <div class="botoes">
                
                    <a id="ler<?php echo($l) ?>" class="ler btn">
                        <p><ion-icon name="document-text-outline"></ion-icon></p>
                        <p>Ler</p>
                    </a>

                    <a id="baixar" href="<?php echo($pdf['pasta']) ?>" download class="baixar btn">
                        <p><ion-icon name="arrow-down-circle-outline"></ion-icon></p>
                        <p>Baixar</p>
                    </a>
                </div>
            </div>

            <div id="leitor<?php echo($l) ?>" class="leitor">
                <div id="fechar<?php echo($l) ?>" class="fechar">
                    <ion-icon name="add-outline" role="img" class="md hydrated" aria-label="add outline"></ion-icon>    
                </div>
                
                <div id="leitor-tela">
                    <div id="leitor-config">
                        
                        <div id="leitor-pagina">
                            <button class="btn1" onclick="back<?php echo($l) ?>()">anterio</button>
                            
                            <div id="leitor-contagem">
                            <span id="page_num<?php echo($l) ?>"></span> / <span id="page_count<?php echo($l) ?>"></span>
                            </div>
                            
                            <button class="btn1" onclick="next<?php echo($l) ?>()">proximo</button>
                        </div>
                        
                        <button class="btn2" onclick="minZoom<?php echo($l) ?>()">-</button>
                        <button class="btn2" onclick="maxZoom<?php echo($l) ?>()">+</button>
                    </div>

                    <div id="leitor-apresentar">
                        <canvas style="display: none" id="the-canvas<?php echo($l) ?>" class="the-canvas"></canvas>
                        <div id="carregar<?php echo($l) ?>" class="carregar">
                            <div id="carrega"></div>
                            <div id="carrega2"></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

            <script>
                
                const carregar<?php echo($l) ?> = document.getElementById('carregar<?php echo($l) ?>');
                const load<?php echo($l) ?> = document.getElementById('the-canvas<?php echo($l) ?>');
                
                //document.getElementById("the-canvas<?php echo($l) ?>").addEventListener("change", myFunction());

                function myFunction() {
                    load<?php echo($l) ?>.style.display = "none";
                    carregar<?php echo($l) ?>.style.display = "flex";
                }
            </script>

            <script>
                const ler<?php echo($l) ?> = document.getElementById('ler<?php echo($l) ?>');
                const leitor<?php echo($l) ?> = document.getElementById('leitor<?php echo($l) ?>');
                const apresentar<?php echo($l) ?> = document.getElementById('apresentar<?php echo($l) ?>');
                const fechar<?php echo($l) ?> = document.getElementById('fechar<?php echo($l) ?>');
                

                ler<?php echo($l) ?>.addEventListener("click", evento<?php echo($l) ?> => {
                    leitor<?php echo($l) ?>.style.display = "flex";
                })
                
                fechar<?php echo($l) ?>.addEventListener("click", even<?php echo($l) ?> => {
                    leitor<?php echo($l) ?>.style.display = "none";
                })
            </script>

            <script>
            
                // Url do arquivo pdf
                var url<?php echo($l) ?> = '../<?php echo($pdf['pasta']) ?>';

                // Carrega via <script> tag, cria endereço para acesso ao PDF.js exports.
                var pdfjsLib<?php echo($l) ?> = window['../pdfjs-dist/build/pdf'];

                // Local do dpf.worker.js
                pdfjsLib<?php echo($l) ?>.GlobalWorkerOptions.workerSrc = '../pdfjs-dist/build/pdf.worker.js';
                // Asynchronous download do PDF
                var loadingTask = pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>);

                window.scale = 1.5;

                function renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>) {

                    loadingTask.promise.then(function(pdf) {
                        console.log('PDF loaded');
                    
                        // Pega primeira page
                        pdf.getPage(pageNumber<?php echo($l) ?>).then(function(page) {
                        console.log('Page loaded: '+ pageNumber<?php echo($l) ?> );
                        
                        
                        var viewport = page.getViewport({scale: scale});

                        // Prepara canvas usando as dimensões da página PDF
                        var canvas = document.getElementById('the-canvas<?php echo($l) ?>');
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;

                        // Renderiza página PDF para canvas 
                        var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                        };
                        var renderTask = page.render(renderContext);

                            renderTask.promise.then(function () {
                                load<?php echo($l) ?>.style.display = "flex";
                                carregar<?php echo($l) ?>.style.display = "none";
                        });
                    });
                    }, function (reason) {
                    // Mostra erro
                    console.error(reason);
                    });

                }

                var pageNumber<?php echo($l) ?> = 0;

                //mostra a primeira página do arquivo pdf

                pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>).promise.then(function(pdfDoc_) {
                    pageNumber<?php echo($l) ?>++;
                    pdfDoc = pdfDoc_;
                    document.getElementById('page_count<?php echo($l) ?>').textContent = pdfDoc.numPages;
                    document.getElementById('page_num<?php echo($l) ?>').textContent = pageNumber<?php echo($l) ?>;  
                
                    window.totalPaginas<?php echo($l) ?> = pdfDoc.numPages;

                    // Chamando a renderizacao da página 1
                    renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                });

                function next<?php echo($l) ?>() {

                    myFunction();

                    if(pageNumber<?php echo($l) ?> == window.totalPaginas<?php echo($l) ?>) {
                        
                        pageNumber<?php echo($l) ?> = 1;

                        pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>).promise.then(function(pdfDoc_) {
                            pdfDoc = pdfDoc_;
                            document.getElementById('page_count<?php echo($l) ?>').textContent = pdfDoc.numPages;
                            document.getElementById('page_num<?php echo($l) ?>').textContent = pageNumber<?php echo($l) ?>;  

                            // Chamando a renderizacao da página 1
                            renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                        });
                    } else {
                        pageNumber<?php echo($l) ?>++;
                        pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>).promise.then(function(pdfDoc_) {
                            pdfDoc = pdfDoc_;
                            document.getElementById('page_count<?php echo($l) ?>').textContent = pdfDoc.numPages;
                            document.getElementById('page_num<?php echo($l) ?>').textContent = pageNumber<?php echo($l) ?>;  
                        
                            // Chamando a renderizacao da página 1
                            renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                        });
                    }
                }

                function back<?php echo($l) ?>() {

                    myFunction();

                    if(pageNumber<?php echo($l) ?> == 1) {
                        
                        pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>).promise.then(function(pdfDoc_) {
                            pdfDoc = pdfDoc_;
                            document.getElementById('page_count<?php echo($l) ?>').textContent = pdfDoc.numPages;
                            document.getElementById('page_num<?php echo($l) ?>').textContent = pdfDoc.numPages;  
                        
                            pageNumber<?php echo($l) ?> = pdfDoc.numPages;

                            // Chamando a renderizacao da página 1
                            renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                        });

                        renderizaPagina<?php echo($l) ?>();
                    } else {
                        pageNumber<?php echo($l) ?>--;
                        pdfjsLib<?php echo($l) ?>.getDocument(url<?php echo($l) ?>).promise.then(function(pdfDoc_) {
                            pdfDoc = pdfDoc_;
                            document.getElementById('page_count<?php echo($l) ?>').textContent = pdfDoc.numPages;
                            document.getElementById('page_num<?php echo($l) ?>').textContent = pageNumber<?php echo($l) ?>;  
                        
                            // Chamando a renderizacao da página 1
                            renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                        });

                        renderizaPagina<?php echo($l) ?>();
                    }
                }

                function maxZoom<?php echo($l) ?>() {

                    const tela = document.getElementById('the-canvas<?php echo($l) ?>');

                    tela.style.scale + "5%";

                    window.scale = window.scale + 0.5;
                    renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                }

                function minZoom<?php echo($l) ?>() {

                    const tela = document.getElementById('the-canvas<?php echo($l) ?>');

                    if(window.scale > 1) {
                        tela.style.scale - "5%";

                        window.scale = window.scale - 0.2;
                        renderizaPagina<?php echo($l) ?>(pageNumber<?php echo($l) ?>);
                    }

                }

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