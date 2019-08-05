<?php

class Connexion
{
    public function __construct()
    {
        try {
            $cnx = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
        // Methode 1 : écrase le contenu de $cnx
        $this->cnx = null; 

        // Methode 1 : écrase le contenu de $cnx
        // unset($this->cnx) écrase complètement la variable $cnx 
    }

    // Fonction de requete SQL préparée
    public function querySQL($request, $execute_params)
    {
        $stmt = $this->cnx->prepare($request);
        $stmt->execute($execute_params);

        // la ligne ci-dessous, c'est pour récupérer le dernier id si l'objet à été ajouter
        return $this->cnx->lastInsertId();

    }

    //getOne("SELECT * FROM product WHERE id=?", [20], "Product")
    public function getOne($request, $execute_params, $class)
    {
        $stmt = $this->cnx->prepare($request);
        $stmt->execute($execute_params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    //getMany("SELECT * FROM product", "Product")
    // $execute_params = [] à la fin des paramètres et un tableau vide au cas ou on ne lui passe pas de parametre
    public function getMany($request, $class, $execute_params = [])
    {
        $stmt = $this->cnx->prepare($request);
        $stmt->execute($execute_params);
        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    // $cnx->setFetchMode
    // FETCH_CLASS -> nom de la classe
}