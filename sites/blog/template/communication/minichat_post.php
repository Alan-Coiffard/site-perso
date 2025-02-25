<?php session_start();
// Connexion à la base de données
include '../../ouvrirBdd.php';

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message, la_date) VALUES(?, ?, NOW())');
$req->execute(array($_SESSION['login'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
?>