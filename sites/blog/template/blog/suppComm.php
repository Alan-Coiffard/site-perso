<?php session_start(); 

// Connexion à la base de données
include '../../ouvrirBdd.php';


$bdd->exec('DELETE FROM commentaires WHERE id="'.$_GET['com'].'" ');



// Redirection du visiteur vers la page du blog
header('Location: commentaire.php?billets='.$_SESSION['billet'].'');
?>