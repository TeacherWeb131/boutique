<?php


require "vendor/autoload.php";
require "utilities/config.php";
require "utilities/Connexion.php";

require "models/Product.php";
require "models/Order.php";
require "models/OrderDetails.php";
require "models/User.php";

require "controllers/Controller.php";
require "controllers/DefaultController.php";
require "controllers/HomeController.php";
require "controllers/ProductController.php";
require "controllers/OrderController.php";
require "controllers/OrderDetailsController.php";
require "controllers/UserController.php";
// ON VA FAIRE UN PROJET MVC : Modele Vue Controller


// ON VA COMMENCER PAR FAIRE UN ROUTER index.php
// NOTRE ROUTE SE TROUVE DANS LA VARIABLE $_SERVER['REQUEST_URI']

// CI-DESSOUS UN URL. URI EST TOUT CE QUI VIENT APRÈS LE NOM DE DOMAINE (monsite.fr) C'EST À DIRE index.php/produit/afficher/45
// monsite.fr/index.php/produit/afficher/45

// index.php ETANT NOTRE ROUTER DISPATCHER
// produit : instancie le controller
// afficher : appelle (execute) la methode 'afficher' du controller
// 45 : fourni un paramètre (exemple: le slug)

//POUR VISUALISER L'URI (url) CONTENU DANS LA VARIABLE GLOBAL $GLOBAL
// var_dump($GLOBALS);

// 1. RECUPÉRER $_SERVER['REQUEST_URI'];
$uri = $_SERVER['REQUEST_URI'];

//$uri = /index.php/produit/afficher/54
// supprimer de cette chaine de characteres /index.php


// 2. SUPPRIMER /index.php/ (NOTRE ROUTER) DE LA CHAINE DE CARACTERE CONTENU DANS $_SERVER['REQUEST_URI']
// monsite.fr/index.php/produit/afficher/45
$uri = str_replace("/index.php", "", $uri );
//$uri = produit/afficher/54


// 3. convertir la partie restante (aaa/bb/vv) en tableau
$params = explode("/", $uri);
// var_dump($params);


// 4. VERIFIER SI L'URI NE CONTIENT RIEN
//=> ON EXECUTE LA METHODE index() (Route="/" Name="index") DU CONTROLLER DEFAULT QUI AFFICHE HABITUELLEMENT LA PAGE D'ACCUEIL, 
// DANS NOTRE EXEMPLE LA LISTE DES PRODUITS (product)
if (empty($params[1]) || !isset($params[1]))
{
    // Intancier le controller default et executer sa méthode index()
    $controlleur = new DefaultController();
    $controlleur->index();
} else {
    $controlleur = $params[1];
    $controlleur = ucfirst($controlleur) . "Controller";
    $instance = new $controlleur();
    if (empty($params[2]) || !isset($params[2])) {
        $instance->index();
    } else {
        $methode = $params[2];
        if (empty($params[3]) || !isset($params[3])) {
            $parameter = null;
        } else {
            $parameter = $params[3];
        }
        $instance->$methode($parameter);
    }
}

// 5. instancier le controlleur (produit)



// 6. éxécuter la methode du controller (afficher)
// explode("/", );



// 7. récupérer les parametres (vv) si on aura besoin



