<?php

class DefaultController
{
    public function index()
    {
        //dd($_SERVER);
        require 'views/home.php';
    }
}