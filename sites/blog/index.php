<?php  
	session_start(); 
	$_SESSION['prenom']    = '';
	$_SESSION['nom']       = '';
	$_SESSION['login']     = '';
	$_SESSION['mail']      = '';
	$_SESSION['age']       = null;
	$_SESSION['mdp']       = '';
	$_SESSION['tel']       = '';
	$_SESSION['verif'] = 1;
	header('Location: premierpage.php');

?>