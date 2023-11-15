<?php
  session_start();
  if($_SESSION['tipo'] !== 'admin' || !isset($_SESSION['login'])){
    header("Location:./");
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Admin - Alex Tour</title>
</head>
<body class="adminBody">
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
      <a href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin" style="text-decoration:underline #0e4861;" href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>
    <div class="container-admin">
      <a href="./criar.php"><button class="subForm">Criar</button></a>
      <a href="./editar.php"><button class="subForm">Editar</button></a>
      <a href="./deletar.php"><button class="subForm">Deletar</button></a>
    </div>
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