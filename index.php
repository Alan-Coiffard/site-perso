<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="images/logo.png" width="500px" />
	<title>Site de présentation</title>

	<?php
	include 'bootstrap-5.0.0/includeBootstrapCss.php';
	require 'implement/arrow-down.php';
	$arrowDown = new arrowDown;
	require 'implement/arrow-up.php';
	$arrowUp = new arrowUp;
	$arrowUp->arrowUp('suis');
	?>
	<link rel="stylesheet" href="css/hovi.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<main>
	<section id="suis">
		<div class="t">
			<h1 class="text-center">Qui suis-je ?</h1>
			<p class="text-justify">
				Récemment diplômé d'un Master en informatique de l'Université d'Umeå et de l'UBO Brest, je me spécialise dans le développement web et l'intelligence artificielle. Fort de plusieurs expériences professionnelles, notamment en développement front-end et full-stack, j'ai acquis des compétences solides en JavaScript (ReactJS, Node.js), en intégration d'API et en conception d'interfaces utilisateur. Passionné par le développement web, j'apprécie particulièrement la création de systèmes fonctionnels et intuitifs. Par ailleurs, je pratique la photographie amateur depuis 4 ans, et vous pouvez découvrir mon portfolio via le lien ci-dessous.
			</p>
		</div>
		<div class="link">
			<ul class="social-icons">
				<li><a class="github" href="https://github.com/Alan-Coiffard"><i class="fa fa-github"></i></a></li>
				<li><a class="www" href="https://portfolio.alan-coiffard.ovh"><i class="fa fa-globe"></i></a></li>
				<li><a class="linkedin" href="https://www.linkedin.com/in/alan-coiffard-924033172"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
		<?php
		$arrowDown->arrowDown('cv');
		?>
	</section>
	<section id="cv" class="cv">
		<div class="file" lang="fr">
			<h2>Mon CV</h2>
			<iframe class="pdf-container" src="./français.pdf#toolbar=0&view=FitH" title="Prévisualisation du PDF"></iframe>
			<div class="buttons">
				<a href="./français.pdf" download="./français.pdf" class="btn btn-primary">Télécharger le PDF</a>
				<a href="./english.pdf" download="./english.pdf" class="btn btn-secondary">English</a>
			</div>
		</div>
	</section>
	<section class="" id="photos">
		<a class="noLien" href="http://portfolio.alan-coiffard.ovh">
			<h1 class="text-center">Mes photos</h1>
			<div class="text-center">Et mon site</div>
		</a>

		<?php
		require 'implement/caroussel.php';

		$caroussel = new caroussel;
		$nom = "caroussel";
		$parsed = $caroussel->recupInfos($nom);
		?>
		<div class="cont">
			<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner">
					<?php
					foreach ($parsed->{'images'} as $key => $value) {
					?>
						<div class="carousel-item <?php if ($key == 1) { ?> active <?php } ?> ">
							<img src="./<?= $value ?>">
						</div>
					<?php } ?>
				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
		</div>
	</section>

	<section id="projets">
		<h1 class="text-center">Mes projets</h1>
		<?php
		$dir = "json/card/";
		require 'implement/cardCarou.php';

		$cardCarou1 = new CardCaroussel;
		$scanned_directory = $cardCarou1->verifDossier($dir);
		?>
		<div class="liste-carre">
			<?php
			$i = 2;
			foreach ($scanned_directory as $key) {
				$nom = $scanned_directory[$i];
				$i++;
				$parsed = $cardCarou1->recupInfos($nom);
				$id 	= $parsed->{'id'};
				$titre 	= $parsed->{'titre'};
				$text 	= $parsed->{'text'};
				$lien	= $parsed->{'lien'};
			?>
				<div class="carre">
					<h5><?php echo ($titre);
						if ($lien != "") {
							echo (" - <a href='$lien'>Lien</a>");
						} ?></h5>
					<p><?php echo ($text) ?></p>
					<img src="../<?= $parsed->{'images'}->{'1'} ?>" />
				</div>
			<?php } ?>
		</div>

	</section>

</main>
<footer class="site-footer">
	<div class="container">
		<div class="row">
			<div class="center col-md-8 col-sm-6 col-xs-12">
				<p class="copyright-text">Created by
					<a href="#">Alan COIFFARD</a>.
				</p>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12">
				<ul class="social-icons">
					<li><a class="github" href="https://github.com/Alan-Coiffard"><i class="fa fa-github"></i></a></li>
					<li><a class="www" href="https://portfolio.alan-coiffard.ovh"><i class="fa fa-globe"></i></a></li>
					<li><a class="linkedin" href="https://www.linkedin.com/in/alan-coiffard-924033172"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<?php include 'bootstrap-5.0.0/includeBootstrapJs.php'; ?>
</body>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var scrollPosition = window.scrollY;
		var stickyBtn = document.querySelector('.hovicon-up');
		window.addEventListener('scroll', function() {

			scrollPosition = window.scrollY;

			if (scrollPosition >= 30) {
				stickyBtn.classList.add('sticky');
			} else {
				stickyBtn.classList.remove('sticky');
			}
		});

	});
</script>

</html>