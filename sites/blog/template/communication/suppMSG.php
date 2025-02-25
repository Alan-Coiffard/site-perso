<?php session_start(); 

// Connexion à la base de données
include '../../ouvrirBdd.php';



$bdd->exec('DELETE FROM minichat WHERE ID="'.$_GET['msg'].'" ');



// Redirection du visiteur vers la page du blog
header('Location: minichat.php');
?>