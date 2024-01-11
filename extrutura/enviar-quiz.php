<form action="enviarQuiz.php" enctype="multipart/form-data" method="POST" id="container">
    
    <div class="titulobox">
        <h3 class="titulo">Titulo do questionario:</h3>
        <input type="text" id="titulo" name="titulo" class="titulo">
    </div>

    <div id="quiz">
        
        <div id="questao1" class="questao">
            <div id="ques">
                <h3>Quesão:</h3>
                <br>
                <textarea id="question1" name="question1" class="question" required></textarea>
                <br>
                <div class="imgq">
                    <img style="display: none" id="imgq1" class="imgq2" src="perfil/foto.png" alt="">
                    <input type="file" name="imagem1" id="imagem1">
                    <label id="enviar" for="imagem1">Adicionar imagem</label>
                </div> 
            </div>
            <div id="choices">
            
                <input type="radio" id="alterA1" value="A" name="alter1">
                <input type="radio" id="alterB1" value="B" name="alter1">
                <input type="radio" id="alterC1" value="C" name="alter1">
                <input type="radio" id="alterD1" value="D" name="alter1">

                <div class="choice" id="A">
                    <div id="letra"><p>A</p></div>
                    <input type="text" class="alter" id="contAlterA1" name="contAlterA1" required>
                    <label for="alterA1" id="alterboxA1" class="alterLabel"></label>
                </div>
                <div class="choice" id="B">
                    <div id="letra"><p>B</p></div>
                    <input type="text" class="alter" id="contAlterB1" name="contAlterB1" required>
                    <label for="alterB1" id="alterboxB1" class="alterLabel"></label>
                </div>
                <div class="choice" id="C">
                    <div id="letra"><p>C</p></div>
                    <input type="text" class="alter" id="contAlterC1" name="contAlterC1" required>
                    <label for="alterC1" id="alterboxC1" class="alterLabel"></label>
                </div>
                <div class="choice" id="D">
                    <div id="letra"><p>D</p></div>
                    <input type="text" class="alter" id="contAlterD1" name="contAlterD1" required>
                    <label for="alterD1" id="alterboxD1" class="alterLabel"></label>
                </div>
            </div>
        </div>

        <div id="questao2" class="questao">
            <div id="ques">
                <h3>Quesão:</h3>
                <br>
                <textarea id="question2" name="question2" class="question" required></textarea>
                <br>
                <div class="imgq">
                    <img style="display: none" id="imgq2" class="imgq2" src="perfil/foto.png" alt="">
                    <input type="file" name="imagem2" id="imagem2">
                    <label id="enviar" for="imagem2">Adicionar imagem</label>
                </div> 
            </div>
            <div id="choices">
            
                <input type="radio" id="alterA2" value="A" name="alter2">
                <input type="radio" id="alterB2" value="B" name="alter2">
                <input type="radio" id="alterC2" value="C" name="alter2">
                <input type="radio" id="alterD2" value="D" name="alter2">

                <div class="choice" id="A">
                    <div id="letra"><p>A</p></div>
                    <input type="text" class="alter" id="contAlterA2" name="contAlterA2" required>
                    <label for="alterA2" id="alterboxA2" class="alterLabel"></label>
                </div>
                <div class="choice" id="B">
                    <div id="letra"><p>B</p></div>
                    <input type="text" class="alter" id="contAlterB2" name="contAlterB2" required>
                    <label for="alterB2" id="alterboxB2" class="alterLabel"></label>
                </div>
                <div class="choice" id="C">
                    <div id="letra"><p>C</p></div>
                    <input type="text" class="alter" id="contAlterC2" name="contAlterC2" required>
                    <label for="alterC2" id="alterboxC2" class="alterLabel"></label>
                </div>
                <div class="choice" id="D">
                    <div id="letra"><p>D</p></div>
                    <input type="text" class="alter" id="contAlterD2" name="contAlterD2" required>
                    <label for="alterD2" id="alterboxD2" class="alterLabel"></label>
                </div>
            </div>
        </div>

        <div id="questao3" class="questao">
            <div id="ques">
                <h3>Quesão:</h3>
                <br>
                <textarea id="question3" name="question3" class="question" required></textarea>
                <br>
                <div class="imgq">
                    <img style="display: none" id="imgq3" class="imgq2" src="perfil/foto.png" alt="">
                    <input type="file" name="imagem3" id="imagem3">
                    <label id="enviar" for="imagem3">Adicionar imagem</label>
                </div> 
            </div>
            <div id="choices">
            
                <input type="radio" id="alterA3" value="A" name="alter3">
                <input type="radio" id="alterB3" value="B" name="alter3">
                <input type="radio" id="alterC3" value="C" name="alter3">
                <input type="radio" id="alterD3" value="D" name="alter3">

                <div class="choice" id="A">
                    <div id="letra"><p>A</p></div>
                    <input type="text" class="alter" id="contAlterA3" name="contAlterA3" required>
                    <label for="alterA3" id="alterboxA3" class="alterLabel"></label>
                </div>
                <div class="choice" id="B">
                    <div id="letra"><p>B</p></div>
                    <input type="text" class="alter" id="contAlterB3" name="contAlterB3" required>
                    <label for="alterB3" id="alterboxB3" class="alterLabel"></label>
                </div>
                <div class="choice" id="C">
                    <div id="letra"><p>C</p></div>
                    <input type="text" class="alter" id="contAlterC3" name="contAlterC3" required>
                    <label for="alterC3" id="alterboxC3" class="alterLabel"></label>
                </div>
                <div class="choice" id="D">
                    <div id="letra"><p>D</p></div>
                    <input type="text" class="alter" id="contAlterD3" name="contAlterD3" required>
                    <label for="alterD3" id="alterboxD3" class="alterLabel"></label>
                </div>
            </div>
        </div>

        <div id="questao4" class="questao">
            <div id="ques">
                <h3>Quesão:</h3>
                <br>
                <textarea id="question4" name="question4" class="question" required></textarea>
                <br>
                <div class="imgq">
                    <img style="display: none" id="imgq4" class="imgq2" src="perfil/foto.png" alt="">
                    <input type="file" name="imagem4" id="imagem4">
                    <label id="enviar" for="imagem4">Adicionar imagem</label>
                </div> 
            </div>
            <div id="choices">
            
                <input type="radio" id="alterA4" value="A" name="alter4">
                <input type="radio" id="alterB4" value="B" name="alter4">
                <input type="radio" id="alterC4" value="C" name="alter4">
                <input type="radio" id="alterD4" value="D" name="alter4">

                <div class="choice" id="A">
                    <div id="letra"><p>A</p></div>
                    <input type="text" class="alter" id="contAlterA4" name="contAlterA4" required>
                    <label for="alterA4" id="alterboxA4" class="alterLabel"></label>
                </div>
                <div class="choice" id="B">
                    <div id="letra"><p>B</p></div>
                    <input type="text" class="alter" id="contAlterB4" name="contAlterB4" required>
                    <label for="alterB4" id="alterboxB4" class="alterLabel"></label>
                </div>
                <div class="choice" id="C">
                    <div id="letra"><p>C</p></div>
                    <input type="text" class="alter" id="contAlterC4" name="contAlterC4" required>
                    <label for="alterC4" id="alterboxC4" class="alterLabel"></label>
                </div>
                <div class="choice" id="D">
                    <div id="letra"><p>D</p></div>
                    <input type="text" class="alter" id="contAlterD4" name="contAlterD4" required>
                    <label for="alterD4" id="alterboxD4" class="alterLabel"></label>
                </div>
            </div>
        </div>

        <div id="questao5" class="questao">
            <div id="ques">
                <h3>Quesão:</h3>
                <br>
                <textarea id="question5" name="question5" class="question" required></textarea>
                <br>
                <div class="imgq">
                    <img style="display: none" id="imgq5" class="imgq2" src="perfil/foto.png" alt="">
                    <input type="file" name="imagem5" id="imagem5">
                    <label id="enviar" for="imagem5">Adicionar imagem</label>
                </div> 
            </div>
            <div id="choices">
            
                <input type="radio" id="alterA5" value="A" name="alter5">
                <input type="radio" id="alterB5" value="B" name="alter5">
                <input type="radio" id="alterC5" value="C" name="alter5">
                <input type="radio" id="alterD5" value="D" name="alter5">

                <div class="choice" id="A">
                    <div id="letra"><p>A</p></div>
                    <input type="text" class="alter" id="contAlterA5" name="contAlterA5" required>
                    <label for="alterA5" id="alterboxA5" class="alterLabel"></label>
                </div>
                <div class="choice" id="B">
                    <div id="letra"><p>B</p></div>
                    <input type="text" class="alter" id="contAlterB5" name="contAlterB5" required>
                    <label for="alterB5" id="alterboxB5" class="alterLabel"></label>
                </div>
                <div class="choice" id="C">
                    <div id="letra"><p>C</p></div>
                    <input type="text" class="alter" id="contAlterC5" name="contAlterC5" required>
                    <label for="alterC5" id="alterboxC5" class="alterLabel"></label>
                </div>
                <div class="choice" id="D">
                    <div id="letra"><p>D</p></div>
                    <input type="text" class="alter" id="contAlterD5" name="contAlterD5" required>
                    <label for="alterD5" id="alterboxD5" class="alterLabel"></label>
                </div>
            </div>
        </div>

    </div>

    <button type="submit" id="enviar2">Enviar</button>

</form>

<script>
    let image1 = document.getElementById('imgq1');
    let file1 = document.getElementById('imagem1');

    let image2 = document.getElementById('imgq2');
    let file2 = document.getElementById('imagem2');

    let image3 = document.getElementById('imgq3');
    let file3 = document.getElementById('imagem3');

    let image4 = document.getElementById('imgq4');
    let file4 = document.getElementById('imagem4');

    let image5 = document.getElementById('imgq5');
    let file5 = document.getElementById('imagem5');

    file1.addEventListener('change', () => {

        if(file1.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            image1.src = reader.result;
            image1.style.display = "flex";
        }

        reader.readAsDataURL(file1.files[0]);
    })

    file2.addEventListener('change', () => {

        if(file2.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            image2.src = reader.result;
            image2.style.display = "flex";
        }

        reader.readAsDataURL(file2.files[0]);
    })

    file3.addEventListener('change', () => {

        if(file3.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            image3.src = reader.result;
            image3.style.display = "flex";
        }

        reader.readAsDataURL(file3.files[0]);
    })

    file4.addEventListener('change', () => {

        if(file4.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            image4.src = reader.result;
            image4.style.display = "flex";
        }

        reader.readAsDataURL(file4.files[0]);
    })

    file5.addEventListener('change', () => {

        if(file5.files.length <= 0) {
            return;
        }

        let reader = new FileReader();

        reader.onload = () => {
            image5.src = reader.result;
            image5.style.display = "flex";
        }

        reader.readAsDataURL(file5.files[0]);
    })
</script>