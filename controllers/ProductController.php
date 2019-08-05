<?php

class ProductController
{
    public function add()
    {
        //Récupération des données du formulaire
        $product = new Product($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['picture']);
        $product->save();
    }
}