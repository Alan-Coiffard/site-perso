<?php 
	require 'implement/section.php';
	$json = file_get_contents("json/fr_infos.json");
	$infos = json_decode($json);
	$section = new section;

?>

<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="images/logo.png" width="500px"/>
		<title>Site de présentation</title>

		<!-- Add -->
		<?php include 'bootstrap-5.0.0/includeBootstrapCss.php'; ?>
		<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<header>
			<a target="_blank" href="https://www.google.fr/maps/place/56700+Hennebont/">
				56700, Hennebont, France
			</a> | 
			<a target="_blank" href="tel:+330651292421">+33 6 51 29 24 21 </a> | 
			<a href="mailto:alan.coiffar@gmail.com">alan.coiffar@gmail.com</a>
			
		</header>
		
		<main>
			<nav>
				<ul>
					<?php
					foreach($infos as $info){
						$x = (array)$info;
						if( !empty($x) ){
					?>
							<li><?php echo $x['name']; ?></li>
							<?php
						}
					}
					?>
				</ul>
			</nav>
			<div class="corp">
				<h1>Alan COIFFARD</h1>
				<?php 
					if (isset($infos->test)) {
						$section->afficherSection($infos->test); 
					}
					if (isset($infos->links)) {
						$section->afficherSection($infos->links); 
					}
					if (isset($infos->resume)) {
						$section->afficherSection($infos->resume); 
					}
					if (isset($infos->skills)) {
						$section->afficherSection($infos->skills); 
					} 
					if (isset($infos->education)) {
						$section->afficherSectionEducation($infos->education); 
					}


				?>
			</div>
		</main>
		<?php include 'bootstrap-5.0.0/includeBootstrapJs.php'; ?>	
	</body>
</html>					