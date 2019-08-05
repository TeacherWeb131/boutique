<?php

// 1 ==> Créez une nouvelle base de données "boutique"
// 2 ==> Créez un fichier install.php
// 3 ==> Dans ce fichier, créez les tables de la base de données en utilisant L 'extension PHP Data Objects (PDO)



$connec_host = 'localhost';
$connec_dbname = 'boutique';
$connec_pseudo = 'root';
$connec_mdp = 'troiswa';

try{
    $pdo = new PDO('mysql:host=' . $connec_host . ';dbname=' . $connec_dbname, $connec_pseudo, $connec_mdp);
} catch (PDOException $e) {
    echo $e->getMessage();
    die;
}

// Création de la table user
$createTableUser = "CREATE TABLE user 
    ( id INT NOT NULL AUTO_INCREMENT , 
    first_name VARCHAR(50) NOT NULL , 
    last_name VARCHAR(50) NOT NULL , 
    email VARCHAR(255) NOT NULL , 
    created_at DATETIME NOT NULL , 
    PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8";

// Création de la table product
$createTableProduct = "CREATE TABLE products
    ( `id` INT NOT NULL AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL , 
    description TEXT NOT NULL , 
    price FLOAT NOT NULL , 
    quantity INT NOT NULL , 
    picture_url VARCHAR(255) NOT NULL ,
    PRIMARY KEY (id)) ENGINE = InnoDB DEFAULT CHARSET=utf8";

// Création de la table order
$createTableOrder = "CREATE TABLE `order` 
    ( id INT NOT NULL AUTO_INCREMENT , 
    created_at DATETIME NOT NULL , 
    submitted_at DATETIME NULL , 
    total_ht FLOAT NOT NULL , 
    total_ttc FLOAT NOT NULL , 
    user_id INT NOT NULL , 
    PRIMARY KEY (id)) ENGINE = InnoDB";

// Création de la table order_details
$createTableOrderDetails = "CREATE TABLE order_details
    ( `id` INT NOT NULL AUTO_INCREMENT , 
    quantity_ordered INT NOT NULL , 
    price_each FLOAT NOT NULL , 
    total_price FLOAT NOT NULL , 
    order_id INT NOT NULL , 
    product_id INT NOT NULL , 
    PRIMARY KEY (id)) ENGINE = InnoDB";


// Faire la liaison entre la clé étrangère user_id de la table order à la table user
// ATTENTION DE METTRE LES CARACTÈRES STYLE SIMPLE COTE AUTOUR DE LA TABLE order SINON MYSQL LE CONFOND AVEC LE MOT order RÉSERVÉ
$alterTableOrder = "ALTER TABLE `order` 
    ADD FOREIGN KEY (user_id) REFERENCES user(id) 
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION";

// Faire la liaison entre la clé étrangère product_id de la table order_details à la table product
$alterTableOrderDetails1 ="ALTER TABLE order_details
    ADD FOREIGN KEY (product_id) REFERENCES products(id) 
    ON DELETE NO ACTION 
    ON UPDATE NO ACTION";

// Faire la liaison entre la clé étrangère order_id de la table order_details à la table order
$alterTableOrderDetails2 = "ALTER TABLE order_details 
    ADD FOREIGN KEY (order_id) REFERENCES `order`(id) 
    ON DELETE RESTRICT 
    ON UPDATE RESTRICT";

// REQUETE DE CREATION DE LA DATABASE SI LA DATABASE N'EXISTE PAS
$sqlDropDatabaseCreate = "DROP DATABASE [IF EXISTS] boutique CREATE DATABASE boutique";

$pdo->query($sqlDropDatabaseCreate);
$pdo->query($createTableUser);
$pdo->query($createTableProduct);
$pdo->query($createTableOrder);
$pdo->query($createTableOrderDetails);
$pdo->query($alterTableOrder);
$pdo->query($alterTableOrderDetails1);
$pdo->query($alterTableOrderDetails2);

// Deconnexion
$pdo=null;

// 2eme possibilité de deconnexion
// unset($pdo);