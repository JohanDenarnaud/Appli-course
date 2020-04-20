<?php  session_start();
	
	


 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Page accueil coureur</title>
</head>
<body>
	<main class="container">
		<?php if(isset($_POST['date_depart'])){$_SESSION['date_depart']=$_POST['date_depart'];}; ?>

		<h1>Départ de la Course</h1><br>

		<h3> le <?php echo $_SESSION['date_depart'] ?></h3>	<br>
	

<?php 

function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$bdd = new PDO('mysql:host=localhost;port=3308;dbname=course_a_pieds;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$manager = new CoureursManager($bdd);
$liste_coureurs_en_course = $manager -> selectCoureursEnCourse();
$liste_coureurs_arrives = $manager -> selectCoureursArrives();




 ?>
 	
 	<div class="row">
 		<div class="col">
			<h4>Coureurs en course</h4>
				<table class="table">
					<thead class="table-danger">
						<tr>
							<th>Numéro de dossard</th>
							<th>Nom</th>
							
							
						</tr>
					</thead>
					<body>
						<?php

						foreach ($liste_coureurs_en_course as $key => $value) {

						 ?>
						<tr>
							<td><?php echo htmlspecialchars($value->getId()); ?></td>
							<td><?php echo htmlspecialchars($value->getNom()); ?></td>
							
							

							<td><form method="post" action="modifier_coureur">
							<input type="hidden" name="id" value="<?php echo htmlspecialchars($value->getId());?>"><button class="btn btn-success" type="submit">Arrivé(e)</button></td>
							</form>
							
						</tr>
					<?php
					 };
					
					 ?>
					</body>
				</table>
		</div>
		<div class="col">
			<h4>Coureurs arrivés</h4>
				<table class="table">
					<thead class="table-success">
						<tr>
							<th>Numéro de dossard</th>
							<th>Nom</th>
							
							<th>Date d'arrivée</th>
							<th>Place</th>
						</tr>
					</thead>
					<body>
						<?php

						foreach ($liste_coureurs_arrives as $key => $value) {

						 ?>
						<tr>
							<td><?php echo htmlspecialchars($value->getId()); ?></td>
							<td><?php echo htmlspecialchars($value->getNom()); ?></td>
							
							<td><?php echo htmlspecialchars($value->getdate_arrivee()) ; ?></td>
							<td><?php echo htmlspecialchars($value->getPlace()); ?></td>

							
							
						</tr>
					<?php
					 };
					
					 ?>
					
					</body>
				</table>
		</div>
	</div>



		
		
	 <form method="post" action="fin_course.php">
			 	<button class="btn btn-danger" type="submit">Fin de la Course</button>

			 </form>
	</main>
</body>
</html>



