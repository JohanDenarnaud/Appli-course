<?php 

Class CoureursManager{

	private $_bdd;

	public function __construct($bdd){
		$this->setDdb($bdd);
	}

	public function add(Coureur $coureur){

		$q = $this->_bdd->prepare('INSERT INTO coureurs (nom, sexe, ddn) VALUES (:nom, :sexe, :ddn)');
		$q -> execute(array(
			
			'nom' => $coureur->getNom(),
			'sexe' => $coureur->getSexe(),
			'ddn' => $coureur->getDdn(),
		));

		$q->closeCursor();
	
	}

	public function delete(Coureur $coureur){

		// coder delete
	}

	public function selectAll(){

		$coureurs = [];

		$q = $this->_bdd->query('SELECT * FROM coureurs ORDER BY date_arrivee');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$coureurs[] = new Coureur ($donnees);
		}
		return $coureurs;
		
	}

	public function selectCoureursEnCourse(){

		$coureurs = [];

		$q = $this->_bdd->query('SELECT * FROM coureurs WHERE date_arrivee IS NULL');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$coureurs[] = new Coureur ($donnees);
		}
		return $coureurs;
		
	}

	public function selectCoureursArrives(){

		$coureurs = [];

		$q = $this->_bdd->query('SELECT * FROM coureurs WHERE date_arrivee IS NOT NULL ORDER BY date_arrivee');

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$coureurs[] = new Coureur ($donnees);
		}
		return $coureurs;
		
	}

	public function selectById($id){

		// select 1 coureur

	}

	public function update($id, $date, $place){
		$rq = $this->_bdd->prepare('UPDATE coureurs SET date_arrivee = :date_arrivee , place = :place WHERE id = :id' );
		$rq -> execute(array(
			'date_arrivee' => $date,
			'id' => $id,
			'place' => $place
		));
	}

	

	public function delete_date_arrivee(){
		$rq = $this->_bdd->exec('UPDATE coureurs SET date_arrivee = NULL');
	}

	public function setDdb(PDO $bdd){
		$this->_bdd = $bdd;
	}



}


 ?>