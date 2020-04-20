<?php 

Class Coureur{

	private $_id;
	private $_nom;
	private $_sexe;
	private $_ddn;
	private $_date_arrivee;
	private $_place;
	

	/*public function __construct($id, $dossard, $nom, $sexe, $ddn, $vitesse){
	    echo 'Voici le constructeur !'; // Message s'affichant une fois que tout objet est créé.
	    $this->setId($id); 
	    $this->setNom($nom); 
	    $this->setSexe($sexe); 
	    $this->setDdn($ddn); 
	    $this->setVitesse($vitesse);     
  	}*/

  	public function __construct(array $donnees){
  		$this->hydrate($donnees);
  	}

    public function hydrate(array $donnees)
	{
	    foreach ($donnees as $key => $value)
	    {
	      $method = 'set'.ucfirst($key);
	      
	      if (method_exists($this, $method))
	      {
	        $this->$method($value);
	      }
	    }
 	}


	public function getId()
	{
	    return $this->_id;
	}
	 
	public function setId($id)
	{
	    $this->_id = $id;
	    return $this;
	}


	public function getNom()
	{
	    return $this->_nom;
	}
	 
	public function setNom($nom)
	{
	    $this->_nom = $nom;
	    return $this;
	}

	public function getSexe()
	{
	    return $this->_sexe;
	}
	 
	public function setSexe($sexe)
	{
	    $this->_sexe = $sexe;
	    return $this;
	}

	public function getDdn()
	{
	    return $this->_ddn;
	}
	 
	public function setDdn($ddn)
	{
	    $this->_ddn = $ddn;
	    return $this;
	}

	public function getDate_arrivee()
	{
	    return $this->_date_arrivee;
	}
	 
	public function setDate_arrivee($date_arrivee)
	{
	    $this->_date_arrivee = $date_arrivee;
	    return $this;
	}

	public function getPlace()
	{
	    return $this->_place;
	}
	 
	public function setPlace($place)
	{
	    $this->_place = $place;
	    return $this;
	}

	
}


 ?>