<?php 

function dataBrasilToMysql($value){
    $result = explode("/",$value);
    $dia = $result[0];
    $mes = $result[1];
    $ano = $result[2];
    return $ano ."-" . $mes . "-" . $dia;
}

function moveUploadedFile($pasta,$file){
    $novoNome = uniqid();
    $i = 0;
    while($i <= 4){
        $i++;
    }
    move_uploaded_file($file["tmp_name"], $pasta . $novoNome.$i. "." . strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)));
}