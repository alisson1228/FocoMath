<?php 

if(isset($_GET['questionario'])) {
    $_SESSION['questionario'] = $_GET['questionario'];
    $queistionario = $_SESSION['questionario'];
} else {
    $queistionario = $_SESSION['questionario'];
}

$sql1 = 'SELECT * FROM questao WHERE qsid LIKE "'.$queistionario.'"';
$sql2 = "SELECT * FROM alternativas";

$result1 = mysqli_query($link , $sql1);
$result2 = mysqli_query($link , $sql2);

?>

<script id="test">
    // select all elements
    const start = document.getElementById("start");
    const quiz = document.getElementById("quiz");
    const question = document.getElementById("question");
    const qImg = document.getElementById("qImg");
    const choice1 = document.getElementById("A");
    const choice2 = document.getElementById("B");
    const choice3 = document.getElementById("C");
    const choice4 = document.getElementById("D");
    const counter = document.getElementById("alter");
    const timeGauge = document.getElementById("timeGauge");
    const progress = document.getElementById("progress");
    const scoreDiv = document.getElementById("scoreContainer");
    const scoreDiv1 = document.getElementById("porcent");
    const scoreDiv2 = document.getElementById("pontos");
    const scoreDiv3 = document.getElementById("body");

    // create our questions
    let questions = [
        <?php  
            
        foreach($result1 as $img_data) {

            $questao = $img_data['conteudo'];
            $quesid = $img_data['qid'];

            $sql3 = "SELECT * FROM alternativas WHERE qid LIKE '".$quesid."'";
            $sql4 = "SELECT * FROM altercerta WHERE qid LIKE '".$quesid."'";
            $sql5 = "SELECT * FROM imgq WHERE qid LIKE '".$quesid."'";

            $result3 = mysqli_query($link , $sql3);
            $result4 = mysqli_query($link , $sql4);
            $result5 = mysqli_query($link , $sql5);

            $row = $result4->fetch_assoc();
            $row2 = $result5->fetch_assoc();
            

            echo('
            {
                question : "'.$questao.'",
                
            ');

            if($row2 == true){
                $img = $row2['pasta'];

                echo("
                    imgSrc : '".$img."',
                ");

            } else {
                echo("
                    imgSrc : '0',
                ");
            };

            $p = 0;

            foreach($result3 as $alter) {
                    
                $p++;

                $alternativa = $alter['conteudo'];

                echo('
                    choice'.$p.' : "'.$alternativa.'",
                ');
            }
                
            echo('
                correct : "'.$row['resposta'].'"
            },
            ');
        }
                
        ?>
    ];

    //test

    function testImg() {
        if((questions[runningQuestion].imgSrc) == 0) {
            qImg.style.display = "none";
        } else {
            qImg.style.display = "block";
        }
    };

    // create some variables

    const lastQuestion = questions.length - 1;
    let runningQuestion = 0;
    let count = 0;
    const questionTime = 10; // 10s
    const gaugeWidth = 150; // 150px
    const gaugeUnit = gaugeWidth / questionTime;
    let TIMER;
    let score = 0;

    // render a question
    
    let produtos = 0;

    <?php if(!isset($_GET['pontos'])){ ?>
        //history.replaceState({page: 1}, "Quiz", "?questao="+produtos+"&total="+questions.length);
    <?php } ?>

    function renderQuestion(){
        
        produtos++

        let q = questions[runningQuestion];
        
        question.innerHTML = "<p>"+ q.question +"</p>";
        qImg.innerHTML = "<img src="+ q.imgSrc +">";
        choice1.innerHTML = "<div id=\"letra\"><p>A</p></div> <div id=\"alter\">" + q.choice1 + "</div>";
        choice2.innerHTML = "<div id=\"letra\"><p>B</p></div> <div id=\"alter\">" + q.choice2 + "</div>";
        choice3.innerHTML = "<div id=\"letra\"><p>C</p></div> <div id=\"alter\">" + q.choice3 + "</div>";
        choice4.innerHTML = "<div id=\"letra\"><p>D</p></div> <div id=\"alter\">" + q.choice4 + "</div>";

        testImg()

        <?php if(!isset($_GET['pontos'])){ ?>
        history.replaceState({page: 1}, "Quiz", "?questao="+produtos+"&total="+questions.length);
        <?php } ?>
    }

    start.addEventListener("click",startQuiz);

    // start quiz
    function startQuiz(){
        start.style.display = "none";
        renderQuestion();
        quiz.style.display = "flex";
        renderProgress();
        renderCounter();
        TIMER = setInterval(renderCounter,1000); // 1000ms = 1s
    }

    // render progress
    function renderProgress(){
        for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
            progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
        }
    }

    // counter render

    function renderCounter(){
        if(count <= questionTime){
            counter.innerHTML = count;
            timeGauge.style.width = count * gaugeUnit + "px";
            count++
        }else{
            count = 0;
            // change progress color to red
            answerIsWrong();
            if(runningQuestion < lastQuestion){
                runningQuestion++;
                renderQuestion();
            }else{
                // end the quiz and show the score
                clearInterval(TIMER);
                scoreRender();
            }
        }
    }

    // checkAnwer

    function checkAnswer(answer){
        if( answer == questions[runningQuestion].correct){
            // answer is correct
            score++;
            // change progress color to green
            answerIsCorrect();
        }else{
            // answer is wrong
            // change progress color to red
            answerIsWrong();
        }
        count = 0;
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            // end the quiz and show the score
            clearInterval(TIMER);
            scoreRender();
        }
    }

    // answer is correct
    function answerIsCorrect(){
        document.getElementById(runningQuestion).style.backgroundColor = "rgb(28 197 28)";
    }

    // answer is Wrong
    function answerIsWrong(){
        document.getElementById(runningQuestion).style.backgroundColor = "rgb(239 61 61)";
    }

    // score render
    function scoreRender(){
        scoreDiv.style.display = "flex";
        
        // calculate the amount of question percent answered by the user
        <?php if(isset($_GET['pontos'])){ ?>
        
        const scorePerCent = <?php echo($_GET['porc']) ?>;
        
        const pontos = <?php echo($_GET['pontos']) ?>;
            
        <?php } else { ?>

        const scorePerCent = Math.round(100 * score/questions.length);
        
        const pontos = Math.round(score * 10 * (100 * score/questions.length));

        <?php } ?>

        // choose the image based on the scorePerCent
        let img = (scorePerCent >= 80) ? "../img/5.png" :
                (scorePerCent >= 60) ? "../img/4.png" :
                (scorePerCent >= 40) ? "../img/3.png" :
                (scorePerCent >= 20) ? "../img/2.png" :
                "img/1.png";
        
        scoreDiv1.innerHTML = "<img src="+ img +">";
        scoreDiv1.innerHTML += "<p>"+ scorePerCent +"%</p>";
        
        if(pontos > 0) {
            scoreDiv2.innerHTML = "<p>Você ganhou:</p>";
            scoreDiv2.innerHTML += "<p>+"+ pontos +"</p>";
        } else {
            scoreDiv2.innerHTML = "<p>Infelizmente você errou todas!</p>";
        }
        
        <?php 

            if(!isset($_GET['pontos'])) { ?>
            let produtos = [pontos];
            document.location.search = "?pontos="+produtos+"&porc="+scorePerCent;
        
        <?php } ?>
    }

</script>

<?php 

    if(isset($_GET['pontos'])) { ?>
        <script>
            start.style.display = "none";
            renderQuestion();
            quiz.style.display = "flex";
            scoreRender();
        </script>
    <?php } ?>


<?php 

    if(isset($_GET['pontos'])) {
        
        $email = $_SESSION['email'];
        $p = $_GET['pontos'];

        $sql7 = "SELECT * FROM usuarios WHERE email LIKE '$email'";
        $result7 = mysqli_query($link , $sql);
    
        $row7 = $result7->fetch_assoc();

        $pontos = $row7['pontos'] + $p;

        //echo($pontos);

        $sql6 = "UPDATE usuarios SET pontos='$pontos' WHERE email='$email'";

        $result5 = mysqli_query($link , $sql6);
    }

?>