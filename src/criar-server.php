<?php 
session_start();
require_once("./src/mysqlConnection.php");

if($_SESSION['tipo'] === "admin"){
    
    if(isset($_FILES['img_principal']) && isset($_FILES['img_lugar']) && isset($_FILES['img_descritiva'])){

        //arquivos
        $img_principal = $_FILES['img_principal'];
        $img_lugar = $_FILES['img_lugar'];
        $img_descritiva = $_FILES['img_descritiva'];

        $pasta = "imgs/";

        //nomes originais
        $nome_principal = $img_principal['name'];
        $nome_lugar = $img_lugar['name'];
        $nome_descritiva = $img_descritiva['nome']; 

        $novoNome = uniqid();

        var_dump($img_descritiva);
    }

}


?>