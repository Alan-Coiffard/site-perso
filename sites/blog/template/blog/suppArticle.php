<?php session_start(); 

// Connexion à la base de données
include '../../ouvrirBdd.php';


$bdd->exec('DELETE FROM billets WHERE id="'.$_GET['billets'].'" ');



// Redirection du visiteur vers la page du blog
header('Location: blog.php');
?>