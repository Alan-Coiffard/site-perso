<?php session_start(); 

// Connexion à la base de données
include '../../ouvrirBdd.php';


if (isset($_POST['ntitre']) && isset($_POST['ncontenu'])) {
	// Insertion du message à l'aide d'une requête préparée

	$req = $bdd->prepare('UPDATE billets SET titre = :ntitre, contenu = :ncontenu WHERE id = :idj');
	$req->execute(array(
		'ntitre' => $_POST['ntitre'],
		'ncontenu' => $_POST['ncontenu'],
		'idj' => $_SESSION['idb']
		));
}



// Redirection du visiteur vers la page du blog
header('Location: blog.php');
?>