<?php


class User
{
    // proprietés

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $created_at;
    private $password;
    private $admin;

    public function __construct($first_name, $last_name, $email, $password, $admin = 0)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->created_at = date("Y-m-d H:i:s");
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->admin = $admin;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

	/**
	 * Get the value of email
	 */ 
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of email
	 *
	 * @return  self
	 */ 
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

        return $this;
    }
    
    // Methode pour insérer un User (un utilisateur)
    public function save()
    {
        $cnx = new Connexion();
        $cnx->querySQL(
            "INSERT INTO user (first_name, last_name, email,created_at, password, admin) VALUES (?,?,?,?,?,?)",
            [
                $this->first_name,
                $this->last_name,
                $this->email,
                $this->created_at,
                $this->password,
                $this->admin

            ]
        );
    }

    // méthode pour la récupération d'un seul User (une seule utilisateur)
    public function getUserById($id)
    {
        $cnx = new Connexion();
        $user = $cnx->getOne("SELECT * FROM user WHERE id=?", $id, get_class($this));
        return $user;
    }

    // méthode pour la récupération de la liste de tous les User (tous les utilisateurs)
    public function getAllUsers()
    {
        $cnx = new Connexion();
        $users = $cnx->getMany("SELECT * FROM user", "User");
        return $users;
    }


}
