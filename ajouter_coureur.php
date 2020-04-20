<?php 

function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.


$bdd = new PDO('mysql:host=localhost;port=3308;dbname=course_a_pieds;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$manager = new CoureursManager($bdd);

if(isset($_POST['ajouter_coureur'])){

$coureur = new Coureur(['nom'=>$_POST['nom'], 'sexe'=>$_POST['sexe'], 'ddn'=>$_POST['ddn']]);
	$manager->add($coureur);
header('Location: index.php' );


}
 ?>