<?php

class MysqlConnection{

    private $pdo = new PDO("mysql:dbname=alextour;host=localhost:3306", "root", "");
    
    public function getFromDB($tabela,$condicao,$dado)
    {
        $querry = "SELECT * FROM :tabela WHERE :condicao = :dado";
        $statement = $this->pdo->prepare($querry);
        $statement->bindValue(":tabela",$tabela,PDO::PARAM_STR);
        $statement->bindValue(":condicao",$condicao,PDO::PARAM_STR);
        $statement->bindValue(":dado",$dado,PDO::PARAM_STR);
        if($statement->execute()){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}