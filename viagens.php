<?php
  require_once("./src/mysqlConnection.php");
  session_start(); 

  $querry = "SELECT * FROM historico_viagens";
  $statement = $pdo->prepare($querry);
  $statement->execute();
  $array = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Viagens - Alex Tour</title>
</head>
<body class="historico" >
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
              <li><a href="./viagens.php"> Histórico de Viagens</li>
              <li><a href="./">Página Principal</a></li>
              <a><li></li></a>
              <a><li></li></a>
            </ul>
          </nav>
     </header>
    <aside>
      <a href="./index.php">Página Principal</a>
      <a style="text-decoration:underline #0e4861;" href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin"  href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>
    <main>
      <h2 style="text-align: center;color:#0e4861;">Nossas Saídinhas</h2>

      <?php foreach($array as $value):?>
         
       <?php endforeach?> 

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
      if(tipoConta !== "admin" || login !== "logado"){
        admin.style.display = "none";
      }
      if(login !== "logado"){
        logOut.style.display = "none";
      }
    </script>
</body>
</html>