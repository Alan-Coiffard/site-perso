<?php session_start(); 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My super blog</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php include 'menu.php'; ?>

	<div class="contenant2">
		<article>
			<h1>Lastest articles</h1>
			
			<section class="scrollbar" id="style-7">
				<?php
		            // Connexion à la base de données
		            include 'ouvrirBdd.php';

		            // Récupération des 10 derniers messages
		            $reponse = $bdd->query('SELECT * FROM billets ORDER BY id DESC LIMIT 5');

		            // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
		            while ($donnees = $reponse->fetch())
		            {
		                ?>
		                <div class="news">
							<h3 class="news-h"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
							<div class="news-credit">
								<p class="fa fa-calendar"> <?php  echo inversDate(htmlspecialchars($donnees['la_date']))." à ".htmlspecialchars($donnees['heure']); ?></p>
								<p class="fa fa-user-circle"> <?php echo htmlspecialchars($donnees['auteur']);?></p>
								<p class="fa fa-comment"><a href="template/blog/commentaire.php?billets=<?php echo $donnees['id']; ?>"> Comments</a></p>
							</div>
							<p class="news-p">
                            <?php
                                $texte = preg_replace('#(https://|http://)*([a-z0-9._/-]+[.][a-z0-9]+)#i', '<a class="news-a" href="http://$2">$0</a>', $donnees['contenu']);
                                echo $texte; 
                            ?>
                        </p>
						</div>
		                <?php 
		            }

		            $reponse->closeCursor();
			    ?>

		        <?php 
		            function inversDate($date)
		            {
		                $date = explode('-', $date);
		                $jour = $date[2];
		                $mois = $date[1];
		                $anne = $date[0];
		                $date = "$jour-$mois-$anne";
		                return $date;
		            }
		        ?>	
			</section>
			<a href="template/blog/blog.php"><button class="button" style="vertical-align:middle"><span>See more</span></button></a>
			
		</article>
	</div>

	<aside class="scrollbar" id="style-7">
		<?php include 'template/communication/minichat_incl.php'; ?>
	</aside>
	
	

	<script type="text/javascript">
		document.getElementById('video').volume=0.25;
	</script>
	
</body>
</html>