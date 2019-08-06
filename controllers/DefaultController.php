<?php

class DefaultController extends Controller
{
    // La page d'accueil principale
    public function index()
    {
        //dd($_SERVER);
        require 'views/home.php';
    }
}