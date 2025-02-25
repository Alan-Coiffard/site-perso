<?php session_start(); 
	$_SESSION['login']     = '';
	$_SESSION['prenom']    = '';
	$_SESSION['nom']       = '';
	$_SESSION['mail']      = '';
	$_SESSION['age']       = null;
	$_SESSION['mdp']       = '';
	$_SESSION['tel']       = '';
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8"><!--codé par Alan Coiffard--><!--codé par Alan Coiffard-->
 	<title>Register</title>
 	<link rel="stylesheet" type="text/css" href="css/styleForm.css">
 	<link rel="stylesheet" type="text/css" href="css/js5.css">
 	<script type="text/javascript" src="js/js5.js"></script>
 </head>
 <body>
 	<?php 
 		$addr = $_SESSION['ici'];
 	?>
 	<a class="retour" href="../../..<?php echo $addr; ?>"><button>Back</button></a>

 	<div id="formInscId" class="formulaireContact">
		<form method="post" onsubmit="return confirmAll()">
			<center><h1>Register</h1></center>
			
			<div class="sectionFormInsicId">
				<?php 
					if (empty($_POST)) {
						include 'formulaire.php';
					} else {
						include 'formulaire2.php';
					} 
				?>
			</div>		
		</form>
	</div>
 </body>
 </html>
 <!--codé par Alan Coiffard-->