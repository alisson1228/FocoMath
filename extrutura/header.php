<?php

if((isset($_SESSION['email']) == true) && (isset($_SESSION['senha'])) == true) {
    
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM usuarios WHERE email LIKE '$email'";
    
    $result = mysqli_query($link , $sql);

    $row = $result->fetch_assoc();

    $redirct = "../pages/sistema.php";

} else {
    
    $redirct = "../index.php";
    //unset($_SESSION['email']);
    //unset($_SESSION['senha']);
}

?>


<?php

if((isset($_SESSION['email']) == true) && (isset($_SESSION['senha'])) == true) { ?>

<header>
    <a style="text-decoration: none;" href="<?php echo($redirct) ?>"><h1 id="logo">FocoMath</h1></a>

    <div class="option">
        <div class="perfil">
            <div class="info-perfil">
                <ion-icon style="font-size: 22px; color: #ffbc00;" name="trophy"></ion-icon>
                <p><?php echo(number_format($row['pontos'], 0 , ",", ".")); ?></p>
            </div>
                
            <img class="foto-perfil" src="../img/<?php echo($row['pasta']); ?>" alt="">

        </div>

        <div id="menu" class="menu">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>

        <div id="menu-bar" class="menu-bar">
            <div class="head-bar">
                
                <h3 style="font-size: 25px;">Menu</h3>

                <div id="menu2" class="menu2">
                    <span class="line l1"></span>
                    <span class="line l2"></span>
                </div>
            </div>

            <div class="option-bar">

                <div class="option-bar2">
                    <img id="foto-perfil2" class="foto-perfil" src="../img/<?php echo($row['pasta']); ?>" alt="">

                    <p style="font-size: 120%;color: orange;font-weight: bold;text-align: center;"><?php echo($row['nome']); ?></p>
                    <p style="font-size: 100%;color: #6a6a6a;text-align: center;"><?php echo($row['usuario']); ?></p>

                    <div class="info-perfil">
                        <ion-icon style="font-size: 22px; color: #ffbc00;" name="trophy"></ion-icon>
                        <p><?php echo($row['pontos']); ?></p>
                    </div>
                </div>

                <div class="option-bar2">
                    <a id="cadastro-bar" href="../pages/editor.php" style="text-decoration: none;">
                        <p>Editar perfil</p>
                    </a>
            
                    <a id="entrar-bar" href="../services/sair.php" style="text-decoration: none;">
                        <p>Sair</p>
                    </a>
                </div>
            
            </div>
        </div>
    </div>

</header>

<?php } else { ?>

<header>
    <a style="text-decoration: none;" href="<?php echo($redirct) ?>"><h1 id="logo">FocoMath</h1></a>

    <div class="option">
        <div class="perfil">
            
            <a id="cadastro" href="../pages/cadastro.php">
                <p>Cadastrar-se</p>
            </a>
    
            <a id="entrar" href="../pages/login.php">
                <p>Entrar</p>
            </a>
    
        </div>

        <div id="menu" class="menu3">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>

        <div id="menu-bar" class="menu-bar">
            <div class="head-bar">  
                <h3 style="font-size: 25px;">Menu</h3>

                <div id="menu2" class="menu2">
                    <span class="line l1"></span>
                    <span class="line l2"></span>
                </div>
            </div>

            <div class="option-bar">
                <a id="cadastro-bar" href="../pages/cadastro.php">
                    <p>Cadastrar-se</p>
                </a>
        
                <a id="entrar-bar" href="../pages/login.php">
                    <p>Entrar</p>
                </a>
            </div>
        </div>

    </div>
</header>

<?php } ?>

<script>
    const btnMenu = document.getElementById('menu');
    const btnMenu2 = document.getElementById('menu2');
    const barMenu = document.getElementById('menu-bar');

    btnMenu.addEventListener("click", menuEvent => {
        if(barMenu.style.right != 0){
            barMenu.style.right = 0;
        } else {
            barMenu.style.right = "-100%";
        }
    });

    btnMenu2.addEventListener("click", menuEvent => {
        barMenu.style.right = "-100%";
    });

</script>