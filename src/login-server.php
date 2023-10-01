<?php 

session_start();

require_once("./src/mysqlConnection.php");

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];



$querry = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
$statement = $pdo->prepare($querry);
$statement->bindValue(":email",$email);
$statement->bindValue(":senha",$senha);
if($statement->execute()){
   $array = $statement->fetch(PDO::FETCH_ASSOC);
   $_SESSION['login'] = "logado";

   if($array['tipo'] === "admin"){
    $_SESSION['tipo'] = "admin";
   }else{
    $_SESSION['tipo'] = "comun";
   }
   header("Location:../index.php");
}else{
    echo "Alguma Coisa está errada !";
}