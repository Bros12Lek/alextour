<?php

$pdo = new PDO("mysql:dbname=alextour;host=localhost:3306;" ,"root", "250305");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);