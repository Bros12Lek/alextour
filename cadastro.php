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
<body class="cadastroBody" >
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
      <a href="./index.php">Página Principal</a>
      <a href="./viagens.php">Histórico de Viagens <img class="icon" src="./imgs/iconBus.png" alt="" srcset=""></a>
      <a id="admin" href="./admin.php">Admin</a>
      <a style="text-decoration:underline #0e4861;" href="./cadastro.php"  >Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>

    <form method="post" action="./src/cadastro-server.php">
      <p style="display: none;" class="error"></p>
      <div class="inputbox">
        <input id="nome" type="text" name="nome" placeholder="Digite seu nome">
        <span>Nome</span>
        <i></i>
      </div>

      <div class="inputbox">
        <input id="email" type="email" name="email" placeholder="Digite seu email">
        <span>Email</span>
        <i></i>
      </div>

      <div class="inputbox">
        <input id="password" type="password" name="senha" placeholder="Digite sua senha"><img width="16" class="closedEye" height="16" src="https://img.icons8.com/small/16/closed-eye.png" alt="closed-eye"/>
        <span>Senha</span>
        <i></i>
      </div>

      <div class="inputbox">
        <input class="confirmaSenha" name="senha" placeholder="Confirme sua senha">
        <span>Confirme sua senha</span>
        <i></i>
      </div>

      <button class="subForm" type="submit">Cadastrar</button>
      </form>



    <script src="./src/aside.js" ></script>
    <script src="./src/eyeClosedCadastro.js"></script>
    <script src="./src/confirmaSenha.js"></script>

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