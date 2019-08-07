<?php
var_dump($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- Une fois que les fonction setCookie ou deleteCookie ont été lancé (clic sur un bouton), 
    les cookies seront accessible lors du prochain chargement de page dans le tableau $_COOKIE.
    Visible grace au var_dump($_COOKIE); -->
    <button onclick="setCookie('cart', '4 chaussure 1 19' , 4)">Ajouter 'cart' dans le panier</button>
    <button onclick="deleteCookie('cart')">Vider 'cart' du panier</button>
    <script>
        // 1. ON CRÉE UN BOUTON 'Ajouter dans le panier' POUR CHAQUE PRODUIT,
        // AVEC UN EVENT LISTENER 'onclick'

        // En cliquant sur chaque bouton 'Ajouter au panier', 
        // on appelle une fonction Javascript qui va stocker les données du produit dans les cookies 

        // 2. ON RECUPERE TOUS LES COOKIES STOKÉES DANS LE NAVIGATEUR
        // document.cookie

        // 3. ON FORMATE LES DONNÉES DU PRODUIT INSÉRÉ DANS LA PAGE DU PANIER
        //    ON SÉPARE CHAQUE PRODUIT PAR DES ';'
        var $tab = document.cookie.split(';')
        // $tab[0] il va contenir ==> nom=valeur Qu'on veut stocker

        // 4. ON DOIT ENLEVER LA CHAINE DE CARACTÈRE "nom="

        //1,chaussure,1,19-4,pantalon,2,29
        // split("-")

        // COMMETN AJOUTER UN COOKIE:
        // document.cookie = "nom=valeur Qu'on veut stocker; expire=Thu , 29 Aug 2019 15:20:30 UTC; path=/"


        //id_product + nom + qte + prix  

        // FONCTION POUR AJOUTER UN PRODUIT DANS LES COOKIES
        function setCookie(nom, valeur, nbre_jours) {
            var date = new Date()
            date.setTime(date.getTime() + (nbre_jours * 24 * 60 * 60 * 1000))
            document.cookie = nom + "=" + valeur + "; expire=" + date.toGMTString() + "UTC; path=/";
        }

        // ON AJOUTE UN COOKIE (CÀD ON INSERE UNE VALEUR DANS LA VARIABLE GLOBALE $_COOKIES)
        // setCookie("cart", "4 chaussure 1 19", 4);

        // EFFACER LE COOKIE QUI PORTE LE NOM cart (EXEMPLE : BOUTON 'Vider le panier')
        // document.cookie = "cart= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"

        // FONCTION POUR SUPPRIMER UN PRODUIT DANS LES COOKIES
        function deleteCookie(nom) {
            document.cookie = nom + "= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
        }
    </script>
</body>

</html>