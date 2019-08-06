<?php

class HomeController extends Controller
{
    // affiche la page d'accueil
    //monsite.fr/home ou monsite.fr/
    public function index()
    {
        require 'views/public/home.php';
    }

}