a<?php 
session_start();
require_once("./src/mysqlConnection.php");
require_once("./src/functions.php");

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
        $ascentos = $_POST['ascentos'];
        $valor = $_POST['valor'];

        //tratamento de datas
        $data_incioSQL = dataBrasilToMysql($inicio_viagem);
        $data_fimSQL = dataBrasilToMysql($fim_viagem);        


        //lugar que vai as imagens do banco de dados
        $pasta = "./src/imgDB/";

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

        $array_uploaded = [];
        
        $i = 0;
        foreach($array_imgs as $value){
            $i++;
            if(move_uploaded_file($value["tmp_name"], $pasta . $novoNome. $i. "." . strtolower(pathinfo($value['name'], PATHINFO_EXTENSION)))){
                echo "<a href='imgDB/$novoNome$i.".strtolower(pathinfo($value['name'],PATHINFO_EXTENSION))."'>clique aqui</a><br>";
                $valueOf = "imgDB/$novoNome$i.". strtolower(pathinfo($value['name'],PATHINFO_EXTENSION));
                array_push($array_uploaded, $valueOf);
            }
        }

        $dateNow = date('d/m/Y');
        $date = explode("/", $dateNow);
        $dateViagem = explode("/", $inicio_viagem);


        if( $date[2] > $dateViagem[2] && $date[1] > $dateViagem[1]){

            $querry = "INSERT INTO historico_viagens(foto_principal,lugar,foto_lugar,foto_descritiva,ascentos,roteiro,pacote,inicio,fim,valor,foto_banner) VALUES(:foto_principal,:lugar,:foto_lugar,:foto_descritiva,:ascentos,:roteiro,:pacote,:inicio,:fim,:valor,:foto_banner)";
            $statement = $pdo->prepare($querry);
            $statement->bindValue(":foto_principal",$array_uploaded[0]);
            $statement->bindValue(":lugar",$lugar);
            $statement->bindValue(":foto_lugar",$array_uploaded[1]);
            $statement->bindValue(":foto_descritiva", $array_uploaded[2]);
            $statement->bindValue(":ascentos",$ascentos);
            $statement->bindValue(":roteiro",$roteiro);
            $statement->bindValue(":pacote",$pacote);
            $statement->bindValue(":inicio",$data_incioSQL);
            $statement->bindValue(":fim",$data_fimSQL);
            $statement->bindValue(":valor",$valor);
            $statement->bindValue(":foto_banner",$array_uploaded[3]);
            if($statement->execute()){
                echo "deu tudo certo ! <br>";
            }

        }else{
            $querry = "INSERT INTO viagens(foto_principal,lugar,foto_lugar,foto_descritiva,ascentos,roteiro,pacote,inicio,fim,valor,foto_banner) VALUES(:foto_principal,:lugar,:foto_lugar,:foto_descritiva,:ascentos,:roteiro,:pacote,:inicio,:fim,:valor,:foto_banner)";
            $statement = $pdo->prepare($querry);
            $statement->bindValue(":foto_principal",$array_uploaded[0]);
            $statement->bindValue(":lugar",$lugar);
            $statement->bindValue(":foto_lugar",$array_uploaded[1]);
            $statement->bindValue(":foto_descritiva", $array_uploaded[2]);
            $statement->bindValue(":ascentos",$ascentos);
            $statement->bindValue(":roteiro",$roteiro);
            $statement->bindValue(":pacote",$pacote);
            $statement->bindValue(":inicio",$data_incioSQL);
            $statement->bindValue(":fim",$data_fimSQL);
            $statement->bindValue(":valor",$valor);
            $statement->bindValue(":foto_banner",$array_uploaded[3]);
            if($statement->execute()){
                echo "deu tudo certo ! <br>";
                
            }
        }

    }

}