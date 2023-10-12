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
    </header>
    <aside>
      <a style="text-decoration:underline #0e4861;" href="./index.php">Página Principal</a>
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
                <input required type="text" id="tituloViagem" placeholder="Titulo da viagem">
                <label for="lugar">Lugar</label>
                <input required type="text" name="lugar" id="lugar" placeholder="Digite o lugar">
                <label for="inicioViagem">Inicio da Viagem</label>
                <input required type="text" id="inicioViagem" name="inicioViagem" placeholder="dd/mm/yyyy" maxlength="10">
                <label for="fimViagem">Final da Viagem</label>
                <input required type="text" id="fimViagem" name="fimViagem" placeholder="dd/mm/yyyy" maxlength="10">
                <textarea name="areaRoteiro" cols="30" rows="12" placeholder="Roteiro"></textarea>
                <textarea name="areaPacote" id="areaPacote" cols="30" rows="12" placeholder="Pacote"></textarea>
                <input type="file" name="img_principal" id="img_principal">
                <input required type="file" name="img_lugar" id="img_lugar">
                <input required type="file" name="img_descritiva" id="img_descritiva">
                <input type="file" name="img_banner" id="img_banner">
                <button type="submit" class="subForm">Enviar Viagem</button>
            </form>
        </div>
    </main>

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
    <script type="module" src="./src/criar.js"></script>
    <script src="./src/aside.js"></script>
</body>
</html>