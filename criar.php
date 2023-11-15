<?php
session_start();
if($_SESSION['tipo'] !== "admin"){
    header("Location:./index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Criação - Alex Tour</title>
</head>
<body>
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
      <a id="admin" href="./admin.php">Admin</a>
      <a href="./cadastro.php">Cadastro</a>
      <a href="./login.php">Login</a>
      <a id="logOut" href="./src/logOut-server.php">Sair</a>
    </aside>


    <main class="mainCriar">
        <div class="container">
            <form class="criacaoForm" enctype="multipart/form-data" method="post" action="./src/criar-server.php">
                <label for="tituloViagem">Titulo da Viagem</label>
                <input autocomplete="off" required type="text" id="tituloViagem" name="tituloViagem" placeholder="Titulo da viagem">
                <label for="lugar">Lugar</label>
                <input autocomplete="off" required type="text" name="lugar" id="lugar" placeholder="Digite o lugar">
                <label for="inicioViagem">Inicio da Viagem</label>
                <input autocomplete="off" required type="text" id="inicioViagem" name="inicioViagem" placeholder="dd/mm/yyyy" maxlength="10">
                <label for="fimViagem">Final da Viagem</label>
                <input autocomplete="off" required type="text" id="fimViagem" name="fimViagem" placeholder="dd/mm/yyyy" maxlength="10">
                <label for="ascentos">Ascentos</label>
                <input autocomplete="off" type="text" name="ascentos" id="ascentos" placeholder="Quantidade de ascentos">
                <label for="valor">Preço</label>
                <input autocomplete="off" type="text" name="valor" id="valor" placeholder="Digite o preço">
                <textarea autocomplete="off" name="areaRoteiro" cols="30" rows="12" placeholder="Roteiro"></textarea>
                <textarea autocomplete="off" name="areaPacote" id="areaPacote" cols="30" rows="12" placeholder="Pacote"></textarea>
                <p> Imagem Principal <br><input type="file" name="img_principal" id="img_principal"></p>
                <p> Imagem do Lugar <br><input required type="file" name="img_lugar" id="img_lugar"></p>
                <p>imagem descritiva <br><input required type="file" name="img_descritiva" id="img_descritiva"></p>
                <p>Banner <br><input type="file" name="img_banner" id="img_banner"></p>
                <button type="submit" class="subForm">Enviar Viagem</button>
            </form>
        </div>
    </main>

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
    <script type="module" src="./src/criar.js"></script>
    <script src="./src/aside.js"></script>
</body>
</html>