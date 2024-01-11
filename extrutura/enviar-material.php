<form action="enviarMaterial.php" enctype="multipart/form-data" method="POST" id="container">
    
    <div class="titulobox">
        <h3 class="titulo">Nome do material:</h3>
        <input type="text" id="titulo" name="titulo" class="titulo">
    </div>
        
    <div class="imgq">    

        <div id="leitor-tela" style="display: none">
            <div id="leitor-config">
                
                <div id="leitor-pagina">
                    <h3>Preview</h3>
                </div>
            
            </div>

            <div id="leitor-apresentar">
                <canvas style="display: none" id="the-canvas" class="the-canvas"></canvas>
                <div id="carregar" class="carregar">
                    <div id="carrega"></div>
                    <div id="carrega2"></div>
                </div>
            </div>
            
        </div>

        <input type="file" name="imagem" id="imagem">
        <label id="enviar" for="imagem">Adicionar material</label>
    </div>

    <div id="questao1" class="questao">

        <p>tipo de material:</p>

        <input type="radio" id="alterA1" value="material-estruturado" name="alter1" checked>
        <input type="radio" id="alterB1" value="enem" name="alter1">
        <input type="radio" id="alterC1" value="spaece" name="alter1">
        
        <label for="alterA1" id="alterboxA1" class="alterLabel">Material-extruturado</label>
        <label for="alterB1" id="alterboxB1" class="alterLabel">Enem</label>
        <label for="alterC1" id="alterboxC1" class="alterLabel">SPAECE</label>

    </div>

    <button type="submit" id="enviar2">Enviar</button>

</form>

<script>

    let leitor = document.getElementById('leitor-tela');
    let file = document.getElementById('imagem');

    file.addEventListener('change', () => {

        leitor.style.display = "flex"

        let fileUrl = URL.createObjectURL(file.files[0]);

        // Url do arquivo pdf
        window.url = fileUrl;

        // Carrega via <script> tag, cria endereço para acesso ao PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];

        // Local do dpf.worker.js
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdfjs-dist/build/pdf.worker.js';
        // Asynchronous download do PDF
        var loadingTask = pdfjsLib.getDocument(window.url);

        window.scale = 1.5;

        function renderizaPagina(pageNumber) {

            loadingTask.promise.then(function(pdf) {
                console.log('PDF loaded');
            
                // Pega primeira page
                pdf.getPage(pageNumber).then(function(page) {
                console.log('Page loaded: '+ pageNumber );
                
                
                var viewport = page.getViewport({scale: scale});

                // Prepara canvas usando as dimensões da página PDF
                var canvas = document.getElementById('the-canvas');
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
                        load.style.display = "flex";
                        carregar.style.display = "none";
                });
            });
            }, function (reason) {
            // Mostra erro
            console.error(reason);
            });

        }

        var pageNumber = 0;

        //mostra a primeira página do arquivo pdf

        pdfjsLib.getDocument(window.url).promise.then(function(pdfDoc_) {
            pageNumber++;
            pdfDoc = pdfDoc_;

            window.totalPaginas = pdfDoc.numPages;

            // Chamando a renderizacao da página 1
            renderizaPagina(pageNumber);
        });

    })

                
    const carregar = document.getElementById('carregar');
    const load = document.getElementById('the-canvas');
    
    //document.getElementById("the-canvas").addEventListener("change", myFunction());

    function myFunction() {
        load.style.display = "none";
        carregar.style.display = "flex";
    }
</script>