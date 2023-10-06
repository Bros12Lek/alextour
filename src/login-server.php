<?php 

session_start();

require_once("./src/mysqlConnection.php");

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];

$querry = "SELECT * FROM usuarios WHERE email = :email";
$statement = $pdo->prepare($querry);
$statement->bindValue(":email",$email);
$statement->execute();
if($statement->rowCount() >= 1){
    $array = $statement->fetch(PDO::FETCH_ASSOC);
    if(password_verify($senha, $array['senha'])){
        $_SESSION['login'] = "logado";
        if($array['tipo'] === "admin"){
            $_SESSION['tipo'] = "admin";
        }else{
            $_SESSION['tipo'] = "comun";
        }
        header("Location:../index.php");
    }else{
        header("Location:../login.php");
    }
}else{
    header("Location:../login.php");
}