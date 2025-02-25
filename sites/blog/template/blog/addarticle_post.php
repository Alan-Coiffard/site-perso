<?php session_start(); 

// Connexion à la base de données
include '../../ouvrirBdd.php';


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO billets (auteur, titre, contenu, la_date, heure) VALUES(?, ?, ?, NOW(), NOW())');
$req->execute(array($_SESSION['login'], $_POST['titre'], $_POST['contenu']));

// Redirection du visiteur vers la page du blog
header('Location: blog.php');
?>