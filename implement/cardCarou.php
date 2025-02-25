<?php
class CardCaroussel
{
	public function recupInfos($nom){
		$json = file_get_contents("json/card/$nom");

		$parsed_json = json_decode($json);
		return $parsed_json;
	}

	public function verifDossier($dir){
		$scanned_directory = array_diff(scandir($dir), array('..', '.'));
		return $scanned_directory;
	}

  // Nous déclarons une méthode dont le seul but est d'afficher un texte.
	public function afficherCardCarou($parsed_json)
	{
		$id 	= $parsed_json->{'id'};
		$titre 	= $parsed_json->{'titre'};
		$text 	= $parsed_json->{'text'};
		$lien	= $parsed_json->{'lien'};
		$j = 1;
		foreach ($parsed_json->{'images'} as $key) {
			$images[$j] = $parsed_json->{'images'}->{"$j"};
			$j++;
		}

		?>
		<!-- Modal -->
		<div class="modal fade" id="ModalCardCaroussel<?php echo $id; ?>" tabindex="-1" aria-labelledby="ModalCardCarousselLabel<?php echo $id; ?>" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content bg-dark">
					<?php CardCaroussel::creerModalCaroussel($parsed_json); ?>
				</div>
			</div>
		</div>
		<!----Card---->
		<div class="col">
			<div class="card <?php if ($lien != ""): ?> cardhover <?php endif ?> shadow-lg p-3 mb-5 rounded">
				
				<?php if ($lien != ""): ?>
					<a href="<?php echo $lien; ?>" class="noLien">
					<?php endif ?>
					<div class="card-body">
						<h5 class="card-title text-center"><?php echo $titre; ?></h5>
						<p class="card-text text-justify"><?php echo $text; ?></p>
					</div>
					<?php if ($lien != ""): ?>
					</a>
				<?php endif ?>
<?php CardCaroussel::creerCaroussel($parsed_json); ?>
			</div>
		</div>
		<?php 
	}

	public function creerCaroussel($parsed_json){
		$id 	= $parsed_json->{'id'};
		$titre 	= $parsed_json->{'titre'};
		$text 	= $parsed_json->{'text'};
		$lien	= $parsed_json->{'lien'};
		$j = 1;
		foreach ($parsed_json->{'images'} as $key) {
			# code...
			$images[$j] = $parsed_json->{'images'}->{"$j"};
			$j++;
		}

		?>
		<div id="carousel<?php echo $id; ?>" class="carousel slide" data-bs-ride="carousel">
			<ol class="carousel-indicators">
				<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
				<?php 
				$taille = sizeof($images);
				$i = 0;
				if ($taille > 1) {
					foreach ($images as $image) {		    
						?>
						<?php if ($i == 0): ?>
							<li data-bs-target="#carousel<?php echo $i; ?>" data-bs-slide-to="<?php echo $i; ?>" class="active"></li>
							<?php else: ?>
								<li data-bs-target="#carousel<?php echo $i; ?>" data-bs-slide-to="<?php echo $i; ?>"></li>
							<?php endif ?>
							<?php 
							$i++;
						}
					}
					?>
				</ol>
				<div class="carousel-inner">
					<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
					<?php 
					$i = 0;
					foreach ($images as $image) {		    
						?>
						<?php if ($i == 0): ?>
							<div class="carousel-item active" onclick="$('#ModalCardCaroussel<?php echo $id; ?>').modal('show');">
								<img src="<?php echo $image; ?>" class="d-block w-100" alt="<?php echo $image; ?>">
							</div>
							<?php else: ?>
								<div class="carousel-item" onclick="$('#ModalCardCaroussel<?php echo $id; ?>').modal('show');">
									<img src="<?php echo $image; ?>" class="d-block w-100" alt="<?php echo $image; ?>">
								</div>	
							<?php endif ?>

							<?php 
							$i++;
						}

						?>

					</div>
					<?php if ($taille > 1): ?>
						<a class="carousel-control-prev" href="#carousel<?php echo $id; ?>" role="button" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carousel<?php echo $id; ?>" role="button" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</a>						
					<?php endif ?>

				</div>
				<?php 
			}

			public function creerModalCaroussel($parsed_json){
				$id 	= $parsed_json->{'id'};
				$titre 	= $parsed_json->{'titre'};
				$text 	= $parsed_json->{'text'};
				$lien	= $parsed_json->{'lien'};
				$j = 1;
				foreach ($parsed_json->{'images'} as $key) {
			# code...
					$images[$j] = $parsed_json->{'images'}->{"$j"};
					$j++;
				}

				?>
				<div id="modalcarousel<?php echo $id; ?>" class="carousel slide" data-bs-ride="carousel">
					<ol class="carousel-indicators">
						<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
						<?php 
						$taille = sizeof($images);
						$i = 0;
						if ($taille > 1) {
							foreach ($images as $image) {		    
								?>
								<?php if ($i == 0): ?>
									<li data-bs-target="#modalcarousel<?php echo $i; ?>" data-bs-slide-to="<?php echo $i; ?>" class="active"></li>
									<?php else: ?>
										<li data-bs-target="#modalcarousel<?php echo $i; ?>" data-bs-slide-to="<?php echo $i; ?>"></li>
									<?php endif ?>
									<?php 
									$i++;
								}
							}
							?>
						</ol>
						<div class="carousel-inner">
							<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
							<?php 
							$i = 0;
							foreach ($images as $image) {		    
								?>
								<?php if ($i == 0): ?>
									<div class="carousel-item active">
										<img src="<?php echo $image; ?>" class="d-block w-100" alt="<?php echo $image; ?>">
									</div>
									<?php else: ?>
										<div class="carousel-item">
											<img src="<?php echo $image; ?>" class="d-block w-100" alt="<?php echo $image; ?>">
										</div>	
									<?php endif ?>

									<?php 
									$i++;
								}

								?>

							</div>
							<?php if ($taille > 1): ?>
								<a class="carousel-control-prev" href="#modalcarousel<?php echo $id; ?>" role="button" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</a>
								<a class="carousel-control-next" href="#modalcarousel<?php echo $id; ?>" role="button" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</a>						
							<?php endif ?>

						</div>
						<?php 
					}
				}
