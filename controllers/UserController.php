<?php

class UserController extends Controller
{
    // Dashboard d'un client utilisateur
    // accessible en utilisant soit monsite.fr/user soit monsite.fr/user.index
    public function index()
    {
        $this->isConnected();
        require "views/user/index.php";
    }

    // S'authentifier avec ces codes de connexion
    public function login()
    {
        $this->isConnected();
        $error = null;
        if (isset($_POST['cnx'])) {
            $user = User::getUserByEmail($_POST['email']);
            if ($user == false) {
                $error = "L'adresse mail n'existe pas";
            } else {
                if (password_verify($_POST['password'], $user->getPassword())) {
                    // La partie de la session // Création d'une classe  qui permet de gérer la session
                    $session = new Session();
                    $session->onUserLogin($user);
                    $this->redirectTo("/user");
                } else {
                    $error = "Le mot de passe saisie est faut";
                }
            }
        }
        require 'views/user/login.php';
    }

    // Création d'un compte utilisateur
    public function register()
    {
        $this->isConnected();
        $error = null;
        if (isset($_POST["valider"])) {
            $user = new User();
            $user->setFirst_name($_POST["first_name"]);
            $user->setLast_name($_POST["last_name"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST['password']);
            $user->setAdmin(0);
            if ($user->isValid()) {
                $user->save();
                $this->redirectTo("/user");
            } else {
                $error = "Les données saisies sont invalides";
            }
        }
        require "views/user/register.php";
    }

    // Se déconnecter
    public function logout()
    {
        $session = new Session();
        $session->destroy();
        $this->redirectTo("/user/login");
    }

    // Afficher le profil utilisateur
    public function profile()
    {
        $this->isConnected();
        $session = new Session();
        $user = User::getUserById($session->getLoggedUserId());
        require "views/user/profile.php";
    }
}