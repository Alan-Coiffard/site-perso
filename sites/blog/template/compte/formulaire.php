<fieldset class="gauche"><legend><h3>Personal information</h3></legend>
	<label for="pseudoID">Pseudo </label><input type="text" size="20" id="pseudoID" name="login" onkeyup="verifLogin()" required/><br/>

	<label for="prenomID">Last name </label><input type="text" size="20" id="prenomID" name="prenom" onkeyup="verifPrenom()" required/><br/>
	
	<label for="nomID">Surname </label><input type="text" size="20" id="nomID" name="nom" onkeyup="verifNom()" required/><br/>

	<label for="ageID">Age </label><input type="date" size="20" id="ageID" name="age" required/><br/>
	
</fieldset>
<fieldset class="droite"><legend><h3>Password</h3></legend>
	<label for="pwdID">Password </label><input type="password" size="20" id="pwdID" name="mdp" onkeyup="verifMdP()" required/><br>						
	<label for="confirmPwdID">Confirm password </label><input type="password" size="20" id="confirmPwdID" name="confirmPwd" onblur="verifConfirmMdP()" required/><br/>
</fieldset>

<fieldset class="bas"><legend><h3>Contact</h3></legend>
	<label for="telID">Phone number </label><input type="tel" size="20" id="telID" name="tel" onkeyup="verifTelephone()" required/><br/>

	<label for="mailID">E-mail </label><input type="text" size="20" id="mailID" name="mail" onkeyup="verifMail()" required/>

	<br/>
</fieldset>
<input type="submit" value="Register !"/>
<div id="erreurID" class="erreurID"><?php RecupPersonne(); ?></div>

<?php



		function RecupPersonne()
		{
			if (!empty($_POST)) {
				if (Age($_POST['age']) < 0 || Age($_POST['age']) > 130) {

					echo "Date of birth does not match !";

				}else {
					$_SESSION['login'] 		=	$_POST['login'];
					$_SESSION['nom'] 		= 	$_POST['nom'];
					$_SESSION['prenom']		= 	$_POST['prenom'];
					$_SESSION['mdp'] 		= 	$_POST['mdp'];
					$_SESSION['mail'] 		= 	$_POST['mail'];
					$_SESSION['dateNaiss'] 	= 	$_POST['age'];
					$_SESSION['tel'] 		= 	$_POST['tel'];
					$_SESSION['age'] 		= 	Age($_POST['age']);
					$_SESSION['verif'] = 0;
					SaveInfos();
				}
			}
		}

		function SaveInfos()
		{
			
			include '../../ouvrirBdd.php';

			if (VerifCompte()) 
			{
				$req = $bdd->prepare('INSERT INTO compte(nom, prenom, login, mail, dateNaiss, age, mdp, tel) VALUES(:nom, :prenom, :login, :mail, :dateNaiss, :age, :mdp, :tel)');
				$req->execute(array(
					'nom' 		=> $_SESSION['nom'],
					'prenom' 	=> $_SESSION['prenom'],
					'login' 	=> $_SESSION['login'],
					'mail' 		=> $_SESSION['mail'],
					'dateNaiss'	=> $_SESSION['dateNaiss'],
					'age' 		=> $_SESSION['age'],
					'mdp' 		=> $_SESSION['mdp'],
					'tel' 		=> $_SESSION['tel']
					));

				echo 'The account has been added !';
				if ($_SESSION['ici'] == "/blog/premierpage.php") 
				{
					header ('Location: ../../accueil.php'); 
					exit();
				}else {
					header ('Location: http://'.$_SERVER['SERVER_NAME'].$_SESSION['ici'] ); 
					exit();
				}
			}	
		}
			

		function VerifCompte()
		{
			include '../../ouvrirBdd.php';
			$reponse = $bdd->query('SELECT * FROM compte');
			while ($donnees = $reponse->fetch()) {
				if ($donnees['login']==$_SESSION['login']) {
					echo "Login already used !";
					return false;
				}elseif ($donnees['mail']==$_SESSION['mail']) {
					echo "E-mail already used !";
					return false;
				}elseif ($donnees['tel']==$_SESSION['tel']) {
					echo "Phone number already used !";
					return false;
				}
			}
			$reponse->closeCursor();
			return true;
		}

		// Calcule l'âge à partir d'une date de naissance jj/mm/aaaa
		function Age($date_naissance)
		{
			$date_naissance = inversDate($date_naissance);
			$am = explode('/', $date_naissance);
			$an = explode('/', date('d/m/Y'));
			if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0]))) return $an[2] - $am[2];
			return $an[2] - $am[2] - 1;
		}

		function inversDate($date)
		{
			$date = explode('-', $date);
			$jour = $date[2];
			$mois = $date[1];
			$anne = $date[0];
			$date = "$jour/$mois/$anne";
			return $date;
		}
	?>