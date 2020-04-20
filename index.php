<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Page accueil coureur</title>
</head>
<body>
	<main class="container">
	

<?php 

function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$bdd = new PDO('mysql:host=localhost;port=3308;dbname=course_a_pieds;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$manager = new CoureursManager($bdd);
$liste_coureurs = $manager -> selectAll();



 ?>
 	<br>
	<div class = "row">
		
		<div class = "col">
			<h1>Inscription</h1>
 	
			 	<form  method="post" action="ajouter_coureur.php">
			 		<label for="nom">Nom</label>
			 		<input class="form-control" type="text" name="nom" id="nom" placeholder="Nom">
			 		<br>
			 		<label for="id">Date de Naissance</label>
			 		<input class="form-control" type="date" id="id" name="ddn" placeholder="Date de naissance"><br>
			 		<input type="radio" name="sexe" id="feminin" value="feminin">
			 		<label for="feminin">Féminin</label>
			 		<input type="radio" name="sexe" id="masculin" value="masculin">
			 		<label for="masculin">Masculin</label>
			 		<br>
			 		
			 		<button class ="btn btn-primary"
			 		 type="submit" name="ajouter_coureur">Ajouter</button>
			 		 <br><br>
			 		
			 	</form>
				<form method="post" action="depart.php">
					<input type="hidden" name="date_depart" value="<?php echo $date_depart = date('d/m/Y à G:i:s') ?>">
					 <button class="btn btn-success" type="submit" name="depart" action="">Départ de la course</button>
				</form>

		</div>

		<div class="col">
			
			<h1>Liste des coureurs</h1>
	<table class="table">
		<thead class="table-success">
			<tr>
				<th>Numéro de dossard</th>
				<th>Nom</th>
				<th>Sexe</th>
				<th>Date de naissance</th>
			</tr>
		</thead>
		<body>
			<?php

			foreach ($liste_coureurs as $key => $value) {

			 ?>
			<tr>
				<td><?php echo htmlspecialchars($value->getId()); ?></td>
				<td><?php echo htmlspecialchars($value->getNom()); ?></td>
				<td><?php echo htmlspecialchars($value->getSexe()); ?></td>
				<td><?php echo htmlspecialchars($value->getDdn()) ; ?></td>
				
				
			</tr>
		<?php
		 };
		
		 ?>
		</body>


	</table>

	</main>
		</div>
	</div>
	
 	
 	
 	<br><br>
 	
	
</body>
</html>




