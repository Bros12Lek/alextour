<?php 
session_start();
require_once("./src/mysqlConnection.php");


$nome = $_POST['nome'];
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'];


//querrys
$verificacao = "SELECT * FROM usuarios WHERE email = :email";
$cadastrar = "INSERT INTO usuarios VALUES(:nome,:email,:senha,:tipo)";


$statement1 = $pdo->prepare($verificacao);
$statement1->bindValue(":email", $email, PDO::PARAM_STR);
$statement1->execute();
if($statement1->rowCount() < 1){
    $statement = $pdo->prepare($cadastrar);
    $statement->bindValue(":nome", $nome);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":senha",password_hash($senha, PASSWORD_DEFAULT));
    $statement->bindValue(":tipo", "comum");
    $statement->execute();
}