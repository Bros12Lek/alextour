<?php
  session_start(); 
  if($_SESSION['login'] === "logado"){
    header("Location:./index.php");  
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Viagens - Alex Tour</title>
</head>
<body class="loginBody" >
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
      <a href="./index.php">Página Principal</a>
      <a  href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin" href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a style="text-decoration:underline #0e4861;" href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>
    <form method="POST" action="./src/login-server.php">
        <div class="inputbox">
          <input autocomplete="no" id="email" type="email" name="email" placeholder="Digite seu email">
          <span>Email</span>
          <i></i>
        </div>
        <div class="inputbox">
          <input type="password" name="senha" id="senha" placeholder="Digite sua senha"><img width="16" class="closedEye" height="16" src="https://img.icons8.com/small/16/closed-eye.png" alt="closed-eye"/>
          <span>Senha</span>
          <i></i>
        </div>
        <button class="subForm" type="submit">Logar</button>
        <p>Não tem conta ? Crie uma <a style="text-decoration: none; color:#0e4861;" href="./cadastro.php">Clicando Aqui</a></p>
    </form>
    <script src="./src/aside.js" ></script>
    <script src="./src/closedEye.js"></script>
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