<?php 
session_start();

require_once("./src/mysqlConnection.php");

if(!isset($_SESSION['tipo']) || !isset($_SESSION['login'])){
  $_SESSION['login'] = "deslogado";
  $_SESSION['tipo'] = "";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="./styles/style.css">
    <title>Alex - Tour</title>
</head>
<body style="height: 100vh;">
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
    </header>
    <aside>
      <a style="text-decoration:underline #0e4861;" href="./index.php">Página Principal</a>
      <a href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin" href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>
    <div class="banner">
    </div>
    <h2 style="text-align:center; color:#0e4861;">Venha descobrir sua próxima saidera</h2>
    <section class="viagens">
        
    </section>
    <script src="./src/aside.js" ></script>
    <script>
      let login = "<?php echo $_SESSION['login']?>";
      let tipoConta = "<?php echo $_SESSION['tipo']?>"
      let admin = document.querySelector("#admin");
      let logOut = document.querySelector("#logOut");
      if(tipoConta !== "admin" || login !== "logado"){
        admin.style.display = "none";
      }

      if(login !== "logado"){
        logOut.style.display = "none";
      }
    </script>
</body>
</html>