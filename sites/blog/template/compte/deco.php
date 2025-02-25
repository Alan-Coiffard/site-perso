<?php session_start(); 
	
	$_SESSION['prenom']    = '';
	$_SESSION['nom']       = '';
	$_SESSION['login']     = '';
	$_SESSION['mail']      = '';
	$_SESSION['age']       = null;
	$_SESSION['mdp']       = '';
	$_SESSION['tel']       = '';
	$_SESSION['verif'] = 1;
	$_SESSION['imageProfil'] = '';

	?>
	<script type="text/javascript">
		history.go(-1);
	</script>
	<?php 
    //header('Location: index.php');
?><!--codé par Alan Coiffard-->