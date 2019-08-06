<?php

class AdminController
{
    // dashboard pour l'administrateur
    // accessible en utilisant soit: monsite.fr/admin ou monsitefr/admin/index
    public function index()
    {
        require "views/admin/index.php";
    }

    public function listproducts()
    {
        $products = Product::getAllProducts();
        require 'views/admin/list_product.php';
    }

    //monsite.fr/admin/addproduct
    public function ajouterproduct()
    {
        if (isset($_POST['submit'])) {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setDescription($_POST['description']);
            $product->setPrice($_POST['price']);
            $product->setQuantity($_POST['quantity']);
            $product->setPicture($_POST['picture']);
            if ($product->isValid()) {
                $product->save();
                $this->redirectTo('/admin/listproducts');
            }
        }
        // On affiche le formulaire d'ajout de product
        require "views/admin/add_product.php";
    }
}
