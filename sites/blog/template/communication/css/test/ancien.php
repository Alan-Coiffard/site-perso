
			<?php
			// Connexion à la base de données
			try
			{
			    $bdd = new PDO('mysql:host=localhost;dbname=test_open;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
			    die('Erreur : '.$e->getMessage());
			}
			// Récupération des 10 derniers messages
			$reponse = $bdd->query('SELECT id, pseudo, message FROM minichat ORDER BY ID DESC');

			// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
			while ($donnees = $reponse->fetch())
			{
				echo '<p id=' . $donnees['id'] . '><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
			}

			$reponse->closeCursor();
			
			
			/////////////////////////////////////////
			
			if(!empty($_GET['id'])){ // on vérifie que l'id est bien présent et pas vide

				$id = (int) $_GET['id']; // on s'assure que c'est un nombre entier

				// on récupère les messages ayant un id plus grand que celui donné
				$requete = $bdd->prepare('SELECT * FROM messages WHERE id > :id ORDER BY id DESC');
				$requete->execute(array("id" => $id));

				$messages = null;

				// on inscrit tous les nouveaux messages dans une variable
				while($donnees = $requete->fetch()){

					$messages .= "<p id=\"" . $donnees['id'] . "\">" . $donnees['pseudo'] . " dit : " . $donnees['message'] . "</p>";

				}

				echo $messages; // enfin, on retourne les messages à notre script JS

			}

			?>
