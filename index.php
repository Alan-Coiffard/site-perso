<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logo.png" width="500px" />
	<title>Site de présentation</title>

	<!-- Add -->
	<?php include 'bootstrap-5.0.0/includeBootstrapCss.php'; ?>
	<link rel="stylesheet" href="css/style.css">
</head>
<div class="container">

	<main class="container">
		<section class="fond" id="suis">
			<h1 class="text-center">Qui suis-je ?</h1>
			<p class="text-justify">
				Récemment diplômé d'un Master en informatique de l'Université d'Umeå et de l'UBO Brest, je me spécialise dans le développement web et l'intelligence artificielle. Fort de plusieurs expériences professionnelles, notamment en développement front-end et full-stack, j'ai acquis des compétences solides en JavaScript (ReactJS, Node.js), en intégration d'API et en conception d'interfaces utilisateur. Passionné par le développement web, j'apprécie particulièrement la création de systèmes fonctionnels et intuitifs. Par ailleurs, je pratique la photographie amateur depuis 4 ans, et vous pouvez découvrir mon portfolio via le lien ci-dessous. </p>
			<a href="https://www.linkedin.com/in/alan-coiffard-924033172">
				<h2 class="text-center">Linkedin</h2>
			</a>
			<a href="français.pdf">
				<h2 class="text-center">Mon CV</h2>
			</a>
			<a href="english.pdf">
				<h2 class="text-center">My resume</h2>
			</a>
		</section>

		<section class="fond cardhover" id="photos">
			<a class="noLien" href="http://portfolio.alan-coiffard.ovh">
				<h1 class="text-center">Mes photos</h1>
				<center><cite>Et mon site</cite></center>
				<?php

				require 'implement/caroussel.php';

				$caroussel = new caroussel;
				$nom = "caroussel";
				$parsed = $caroussel->recupInfos($nom);

				?><center><?php

							$caroussel->afficherCaroussel($parsed);

							?></center>
			</a>
		</section>

		<section class="fond" id="projets">
			<h1 class="text-center">Mes projets</h1>
			<div class="row row-cols-1 row-cols-md-3 g-4">
				<?php
				require 'implement/cardCarou.php';

				$cardCarou1 = new CardCaroussel;
				$dir = "json/card/";

				$scanned_directory = $cardCarou1->verifDossier($dir);

				$i = 2;
				foreach ($scanned_directory as $key) {
					$nom = $scanned_directory[$i];
					$parsed = $cardCarou1->recupInfos($nom);
					$cardCarou1->afficherCardCarou($parsed);
					$i++;
				}

				?>
			</div>

		</section>

		<!---------------CONTACT--------------------->

		<section class="mb-4" id="contact">

			<?php include 'implement/contact.php'; ?>

		</section>
	</main>
	<?php include 'bootstrap-5.0.0/includeBootstrapJs.php'; ?>
	</body>

</html>