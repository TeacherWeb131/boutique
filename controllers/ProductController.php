<?php

class ProductController extends Controller
{
    // affiche la liste des produits
    //monsite.fr/product ou monsite.fr/product
    public function index()
    {
        
        $products = Product::getAllProducts();

        require 'views/product/list_product.php';
    }

    //monsite.fr/product/show/12
    public function show($id)
    {
        $product = Product::getProductById($id);

        require "views/product/show_product.php";
    }
}