<?php 

session_start();

if(isset($_SESSION['login']) || isset($_SESSION['tipo'])){
    session_unset();
    session_destroy();

    session_start();
    $_SESSION['login'] = "deslogado";
    $_SESSION['tipo'] = "";
    header("Location:../index.php");
}
