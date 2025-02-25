<!--codé par Alan Coiffard--><?php session_start();?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Connection</title>
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
		<form method="get" onsubmit="return confirmAll()">
			<center><h1>Connexion</h1></center>
			<div class="sectionFormInsicId">
				<fieldset class="gauche"><legend><h3>Login</h3></legend>
					<label for="pseudoID">Pseudo</label><input type="text" size="20" id="pseudoID" name="login" required/><br/>
					
					<label for="pwdID">Password</label><input type="password" size="20" id="pwdID" name="mdp" required/><br>	
				</fieldset><!--codé par Alan Coiffard-->
				<input type="submit" value="Connexion !"/>
				<div id="erreurID" class="erreurID"><?php VerifLog(); ?></div>
			</div>		
		</form>
	</div>

	<?php 
	 	

		function VerifLog()
		{
			$info = 0;
			
			include '../../ouvrirBdd.php';

			$reponse = $bdd->query('SELECT * FROM compte');
			while ($donnees = $reponse->fetch()) {
				if (isset($_GET['login']) && isset($_GET['mdp'])) {					
					if ($_GET['login']==$donnees['login'] && $_GET['mdp']==$donnees['mdp']) {
						$_SESSION['login'] 		=	$donnees['login'];
						$_SESSION['nom'] 		= 	$donnees['nom'];
						$_SESSION['prenom']		= 	$donnees['prenom'];
						$_SESSION['mdp'] 		= 	$donnees['mdp'];
						$_SESSION['mail'] 		= 	$donnees['mail'];
						$_SESSION['dateNaiss'] 	= 	$donnees['dateNaiss'];
						$_SESSION['tel'] 		= 	$donnees['tel'];
						$_SESSION['age'] 		= 	$donnees['age'];
						if (!empty($donnees['imageProfil'])) {
							$_SESSION['imageProfil'] = $donnees['imageProfil'];
						}
						echo "les infos ont bien été transmise";

						$_SESSION['verif'] = 0;

						if ($_SESSION['ici'] == "/blog/premierpage.php") {
							header ('Location: ../../accueil.php'); 
							exit();
						}else {
							header ('Location: http://'.$_SERVER['SERVER_NAME'].$_SESSION['ici'] ); 
							exit();
						}

						
												
					}else {
						$info = "Mot de passe ou identifiant erroné";
					}
				} else {
					$info = "Veuillez remplir les information pour vous connecter";
				}
			}
			echo $info;
			$reponse->closeCursor();
			return true;
		}

	?>	
	
	
 	
 </body>
 </html><!--codé par Alan Coiffard-->