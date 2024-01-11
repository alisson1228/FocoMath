<?php 

error_reporting(0);
include('section.php');

if($_SESSION['erronome'] != "") {
    $erroNome = $_SESSION['erronome'];
    $classErro = $_SESSION['classerrou'];
}

?>

<form action="enviarVideo.php" method="post" id="enviar">
    <label for="nome">Nome do video:</label>
    <input type="text" id="nome" name="nome">
    <p class="<?php echo($classErro); ?>"><?php echo($erroNome); ?></p>
    <label for="link">Link do video:</label>
    <input type="text" id="link" name="link">
    
    <div id="video" style="display: none">
        <iframe id="videos" class="apresentar" src="https://www.youtube.com/embed/" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
    </div>
    
    <button type="submit" name="submit" id="submit" value="submit">Salvar</button>
</form>

<script>
    let video = document.getElementById('video');
    let videos = document.getElementById('videos');
    let link = document.getElementById('link');

    link.addEventListener('input', () => {

        if(videos.src.length > 30) {
            videos.src = videos.src.slice(0, videos.src.length - 11);
        }
        
        if(link.value.length === 28){
            videos.src += link.value.slice(17);
            video.style.display = "flex";
        }

        if(link.value.length === 43){
            videos.src += link.value.slice(32);
            video.style.display = "flex";
        }

    })
</script>

<?php 

    unset($_SESSION['erronome']);
    unset($_SESSION['classerro']);

?>