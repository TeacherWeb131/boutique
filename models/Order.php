<?php


class Order
{
    private $id;
    private $created_at;
	private $submitted_at; // c'est la date de l'envoie de la commande ça veut dire qu'elle est nulle par défaut
    private $total_ht;
    private $total_ttc;
    private $user_id;

    public function __construct($total_ht, $total_ttc, $user_id)
    {
        $this->total_ht = $total_ht;
        $this->total_ttc = $total_ttc;
        $this->user_id = $user_id;
        $this->created_at = date("Y-m-d H:i:s");
        // (new DateTime("now"))->format("Y-m-d H:i:s")
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
	 * Get the value of submitted_at
	 */ 
	public function getSubmitted_at()
	{
		return $this->submitted_at;
	}

	/**
	 * Set the value of submitted_at
	 *
	 * @return  self
	 */ 
	public function setSubmitted_at($submitted_at)
	{
		$this->submitted_at = $submitted_at;

		return $this;
	}

    /**
     * Get the value of total_ht
     */ 
    public function getTotal_ht()
    {
        return $this->total_ht;
    }

    /**
     * Set the value of total_ht
     *
     * @return  self
     */ 
    public function setTotal_ht($total_ht)
    {
        $this->total_ht = $total_ht;

        return $this;
    }

    /**
     * Get the value of total_ttc
     */ 
    public function getTotal_ttc()
    {
        return $this->total_ttc;
    }

    /**
     * Set the value of total_ttc
     *
     * @return  self
     */ 
    public function setTotal_ttc($total_ttc)
    {
        $this->total_ttc = $total_ttc;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    // c'est ici que je valide les données du POST envoyées par le formulaire
    public function isValid()
    {
        //...
    }

    // Methode pour insérer un Order (une commande)
    public function save()
    {
        $cnx = new Connexion();
        $id =  $cnx->querySQL(
            "INSERT INTO order (created_at, total_ht, total_ttc, user_id) VALUES (?,?,?,?)",
            [
                $this->created_at,
                $this->total_ht,
                $this->total_ttc,
                $this->user_id
            ]
        );

        return $id;
    }

    public function editSubmittedAt($id)
    {
        $cnx = new Connexion();
        $cnx->querySQL(
            "UPDATE order SET submitted_at = ? WHERE id = ?",
            [
                date("Y-m-d H:i:s"),
                $id
            ]
        );
    }

    // méthode pour la récupération d'un seul order (une seule commande)
    public static function getOrderById($id)
    {
        $cnx = new Connexion();
        $order = $cnx->getOne(
            "SELECT * FROM order WHERE id = ?",
            [$id],
            "Order"
        );

        return $order;
    }

    // méthode pour la récupération de la liste de tous les orders (toutes les commandes)
    public function getAllOrders()
    {
        // A changer et utilser la jointure pour récupérer les détails des commandes
        $cnx = new Connexion();
        return $cnx->getMany(
            "SELECT * FROM order",
            "Order"
        );
    }

    // $order = Order::getOrderById(45);
    // $order_details = OrderDetails::getOrderDetailsByOrder($order->getId())

}
