<?php 
session_start();
require_once("./src/mysqlConnection.php");

if($_SESSION['tipo'] === "admin"){
    
    if(isset($_FILES['img_principal']) && isset($_FILES['img_lugar']) && isset($_FILES['img_descritiva'])){
        //arquivos
        $img_principal = $_FILES['img_principal'];
        $img_lugar = $_FILES['img_lugar'];
        $img_descritiva = $_FILES['img_descritiva'];
        $img_banner = $_FILES['img_banner'];

        $array_imgs = [$img_principal,$img_lugar,$img_descritiva,$img_banner];

        //campos
        $titulo_viagem = $_POST['tituloViagem'];
        $lugar = $_POST['lugar'];
        $inicio_viagem = $_POST['inicioViagem'];
        $fim_viagem = $_POST['fimViagem'];
        $roteiro = $_POST['areaRoteiro'];
        $pacote = $_POST['areaPacote'];

        $array_campos = [$titulo_viagem, $lugar, $inicio_viagem, $fim_viagem, $roteiro, $pacote];


        //lugar que vai as imagens do banco de dados
        $pasta = "imgDB/";

        //nomes originais
        $nome_principal = $img_principal['name'];
        $nome_lugar = $img_lugar['name'];
        $nome_descritiva = $img_descritiva['name']; 
        $nome_banner = $img_banner['name'];

        $novoNome = uniqid();

        $extensao_img_principal = strtolower(pathinfo($nome_principal, PATHINFO_EXTENSION));
        $extensao_img_lugar = strtolower(pathinfo($nome_principal, PATHINFO_EXTENSION));
        $extensao_img_descritiva = strtolower(pathinfo($nome_principal, PATHINFO_EXTENSION));
        $extensao_img_banner = strtolower(pathinfo($nome_banner,PATHINFO_EXTENSION));
   

        //tratamento das extensões
        $array_extensao = [$extensao_img_principal, $extensao_img_lugar, $extensao_img_descritiva, $extensao_img_banner];
        foreach($array_extensao as $value){
            if( $value != "jpg" && $value != "jpeg" && $value != "png"){
                die("Tipo de arquivo não suportado");
            }
        }

        $move_principal = move_uploaded_file($img_principal["tmp_name"], $pasta . $novoNome . "." . strtolower(pathinfo($img_principal['name'], PATHINFO_EXTENSION)));
        $move_lugar = move_uploaded_file($img_lugar["tmp_name"], $pasta . $novoNome . "." . strtolower(pathinfo($img_lugar['name'], PATHINFO_EXTENSION)));
        $move_descritiva = move_uploaded_file($img_descritiva["tmp_name"], $pasta . $novoNome . "." . strtolower(pathinfo($img_descritiva['name'], PATHINFO_EXTENSION)));
        $move_banner = move_uploaded_file($img_banner["tmp_name"], $pasta . $novoNome . "." . strtolower(pathinfo($img_banner['name'], PATHINFO_EXTENSION)));

        if($move_principal && $move_lugar && $move_descritiva){
            echo "";
        }

    }

}