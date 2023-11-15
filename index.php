<?php 
require_once("./src/mysqlConnection.php");
session_start();


if(!isset($_SESSION['tipo']) || !isset($_SESSION['login'])){
    $_SESSION['login'] = "deslogado";
    $_SESSION['tipo'] = "";
  }

  $querry = "SELECT * FROM viagens";
  $statement = $pdo->prepare($querry);
  $statement->execute();
  $array = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./styles/style.css">
    <title>Alex - Tour</title>
</head>
<body style="height:auto;">
    <header>
        <div class="logo">
            <h1 id="title">
              Alex Tour
            </h1>
            <p class="subTittle" >
              Colecionando Momentos  
            </p>
        </div>
        <div class="toggle-menu">
        </div>
        <img id="imgLogo" src="./imgs/logoAlexTour-mobile.png" alt="">
      <div class="conta">
        <img width="50" height="50" src="https://img.icons8.com/ios-filled/50/guest-male--v1.png" alt="guest-male--v1"/>
        <section class="loginSide">
          <a id="login" href="./login.php">Login</a>
          <a id="cadastro" href="./cadastro.php">Cadastro</a>
          <a class="sair" href="./src/logOut-server.php">Sair</a>  
        </section>
      </div>
      <nav>
        <ul>
          <li><a id="adminTop" href="./admin.php">Admin</a></li>
          <li><a href="./viagens.php"> Histórico de Viagens</li>
          <li><a href="./">Página Principal</a></li>
        </ul>
      </nav>
    </header>
    <aside>
      <a style="text-decoration:underline #0e4861;" href="./index.php">Página Principal</a>
      <a href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin" href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>
   

    <main>
      <div class="motivos">
        <h2 style="text-align:center; color:#0e4861;">Porque escolher viajar com a AlexTour ?</h2>
        <p class="pDesc">Na AlexTour não oferecemos apenas viagens em ônibus, mas também, proporcionamos uma experiência inesquecível que transforma cada viagem em uma experiência inegualável. Aqui estão algumas razões para escolher a Alextour como sua agência de viagens e turismo em ônibus</p>

        <div class="descricoes">
          <section class="motivo">
            <img src="./imgs/icons8-pixel-star-100.png" alt="estrela">
            <h3 class="motivoTittle">Qualidade Extrema !</h3>
            <p class="motivoDesc">
              A Alextour é sinônimo de qualidade em todos os aspectos de sua operação. Nossos ônibus modernos são equipados com o mais alto padrão de conforto, proporcionando viagens suaves e agradáveis. Nossa equipe de motoristas altamente treinados e experientes garante que você viaje com segurança e tranquilidade.
            </p>
          </section>
          <section class="motivo">
            <img src="./imgs/icons8-bus-50.png" alt="icone de onibus">
            <h3 class="motivoTittle">Destinos Incríveis</h3>
            <p class="motivoDesc">
              A Alextour oferece uma ampla gama de destinos incríveis, desde cidades cosmopolitas até paisagens naturais deslumbrantes. Seja uma excursão de um dia a locais próximos ou uma jornada épica através de continentes inteiros, temos opções para todos os tipos de viajantes.
            </p>
          </section>
          <section class="motivo">
            <img src="./imgs/icons8-like-50.png" alt="boa experiência">
            <h3 class="motivoTittle">Avaliações Positivas</h3>
            <p class="motivoDesc">
              Não apenas nós acreditamos em nossa qualidade, mas nossos clientes também. Avaliações entusiásticas e depoimentos de viajantes satisfeitos demonstram nossa dedicação à excelência em cada viagem.
            </p>
          </section>
        </div>
      </div>
      <p style="font-size:x-large; background-color:#0e4861; text-align:center; font-family:Agbalumo; margin-bottom:15%;">
        Ao escolher a Alextour, você está escolhendo qualidade, confiabilidade e uma experiência que supera todas as expectativas. Convidamos você a se juntar a nós em uma jornada inesquecível pelo mundo. Descubra o mundo com qualidade. Descubra a Alextour!
      </p>
      <h2>Venha Descobrir a Sua Próxima Saidera !</h2>
      <div class="viagens">
        <?php foreach( $array as $value ): ?>
          <?php endforeach; ?>
      </div>
    </main>
    <footer>
      <h3>
        Alex Tour
      </h3>
      <nav>
        <ul>
          <li><a href="https://www.facebook.com/alexsandrotour" target="_blank"><img src="./imgs/icons8-facebook-50.png" alt="ícone do facebook"></a></li>
          <li><a href="https://www.instagram.com/alextour.oficial/" target="_blank"><img src="./imgs/icons8-instagram-50.png" alt="ícone do instagram"></a></li>
        </ul>
      </nav>
    </footer>
    
    <script src="./src/aside.js" ></script>
    <script>
      let login = "<?php echo $_SESSION['login']?>";
      let tipoConta = "<?php echo $_SESSION['tipo']?>"
      let admin = document.querySelector("#admin");
      let logOut = document.querySelector("#logOut");

      const loginSide = document.querySelector(".loginSide");
      const sair = document.querySelector(".sair");
      const loginPart = document.querySelector("#login");
      const cadastroPart = document.querySelector("#cadastro")
      const adminTop = document.querySelector("#adminTop");

      if(tipoConta !== "admin" || login !== "logado"){
        admin.style.display = "none";
        adminTop.style.display = "none";
      }

      if(login !== "logado"){
        logOut.style.display = "none";
      }

      if(login === "logado"){
        
        cadastroPart.style.display = "none";
        loginPart.style.display = "none";        
        sair.style.display = "inline";

      }
      
    </script>
</body>
</html>