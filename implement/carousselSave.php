<?php
// Nous créons une classe « Personnage ».
class caroussel
{
	public function recupInfos($nom){
		$json = file_get_contents("json/$nom.json");

		$parsed_json = json_decode($json);
		return $parsed_json;
	}

  // Nous déclarons une méthode dont le seul but est d'afficher un texte.
	public function afficherCaroussel($parsed_json)
	{
		$titre = $parsed_json->{'titre'};
		$j = 1;
		foreach ($parsed_json->{'images'} as $key) {
			# code...
			$images[$j] = $parsed_json->{'images'}->{"$j"};
			$j++;
		}
		?>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog  modal-lg">
				<div class="modal-content bg-dark">
					<div id="Modalcarousel<?php echo $titre ?>" class="carousel slide w-100" data-bs-ride="carousel">
						<ol class="carousel-indicators">
							<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
							<?php 
							$i = 0;
							foreach ($images as $lien) {		    
								?>
								<?php if ($i == 0): ?>
									<li data-bs-target="#Modalcarousel<?php echo $i ?>" data-bs-slide-to="<?php echo $i ?>" class="active"></li>
									<?php else: ?>
										<li data-bs-target="#Modalcarousel<?php echo $i ?>" data-bs-slide-to="<?php echo $i ?>"></li>
									<?php endif ?>
									<?php 
									$i++;
								}

								?>
							</ol>
							<div class="carousel-inner">
								<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
								<?php 
								$i = 0;
								foreach ($images as $lien) {		    
									?>
									<?php if ($i == 0): ?>
										<div class="carousel-item active">
											<img src="<?php echo $lien ?>" class="d-block w-100" alt="<?php echo $lien ?>">
										</div>
										<?php else: ?>
											<div class="carousel-item">
												<img src="<?php echo $lien ?>" class="d-block w-100" alt="<?php echo $lien ?>">
											</div>	
										<?php endif ?>

										<?php 
										$i++;
									}

									?>

								</div>
								<a class="carousel-control-prev" href="#Modalcarousel<?php echo $titre ?>" role="button" data-bs-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</a>
								<a class="carousel-control-next" href="#Modalcarousel<?php echo $titre ?>" role="button" data-bs-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</a>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
				<div id="carousel<?php echo $titre ?>" class="carousel slide w-75" data-bs-ride="carousel">
					<ol class="carousel-indicators">
						<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
						<?php 
						$i = 0;
						foreach ($images as $lien) {		    
							?>
							<?php if ($i == 0): ?>
								<li data-bs-target="#carousel<?php echo $i ?>" data-bs-slide-to="<?php echo $i ?>" class="active"></li>
								<?php else: ?>
									<li data-bs-target="#carousel<?php echo $i ?>" data-bs-slide-to="<?php echo $i ?>"></li>
								<?php endif ?>
								<?php 
								$i++;
							}

							?>
						</ol>
						<div class="carousel-inner">
							<?php /*Il faut faire une boucle pour creer le nombre d'image donné en paramétre */ ?>
							<?php 
							$i = 0;
							foreach ($images as $lien) {		    
								?>
								<?php if ($i == 0): ?>
									<div class="carousel-item active">
										<img src="<?php echo $lien ?>" class="d-block w-100 " data-bs-toggle="modal" data-bs-target="#exampleModal" alt="<?php echo $lien ?>">
									</div>
									<?php else: ?>
										<div class="carousel-item">
											<img src="<?php echo $lien ?>" class="d-block w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" alt="<?php echo $lien ?>">
										</div>	
									<?php endif ?>

									<?php 
									$i++;
								}

								?>

							</div>
							<a class="carousel-control-prev" href="#carousel<?php echo $titre ?>" role="button" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carousel<?php echo $titre ?>" role="button" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</a>
						</div>
						<?php 
					}
				}
