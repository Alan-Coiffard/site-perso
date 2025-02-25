<?php include 'template/header.php'; ?>

<script type="text/javascript">

function randFilm(){
<?php
$Films = array();
foreach ($films as $film){
			$Films = $film;
		}
$result = array_rand($idFilms, 1);
		$select = $db->query('select * from les_films where id=$result');
		if (!empty($select) && !empty($result)) {
			include 'template/func.php';
		}
?> 
}

</script>
<body class="p-3 mb-2 bg-dark">

	<div class="container">
		<center><img src="https://fontmeme.com/permalink/200822/3b062cb869964a4d8bd2be62939dd397.png" class="text-center" alt="netflix-font" border="0"></center><br>

		<center><button class="btn btn-success" onclick="randFilm()">Selection d'un film aléatoire</button></center>
		<br>
		<div class="accordion" style="background-color: grey;" id="accordionExample">
			<div class="card">
				<div class="card-header" id="headingTwo">
					<h2 class="mb-0">
						<button class="btn text-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							Voir la liste des films/séries
						</button>
					</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
					<ul class="list-group">
						<?php foreach ($films as $film):?>
							<li class="list-group-item bg-dark">
								<div class="media">
									<a href="image/mini/<?= $film['grande']?>" data-size="1600x1067">
										<img src="image/mini/<?= $film['miniature'] ?>" class="mr-3" >
									</a>
									<div class="media-body">
										<h5><?= $film['titre']; ?></h5>
										<br>
										<?php if ($film['resume'] != null): ?>
											<p class="text-justify"><?= $film['resume']; ?></p>
											<?php else: ?>
												
												<p>Il n'y a pas encore de résumé</p>
												
											<?php endif ?>
											<a class="btn btn-primary fa fa-refresh" data-toggle="collapse" href="#collapseExample<?=$film['id']?>" role="button" aria-expanded="false" aria-controls="collapseExample">
												Modifer
											</a>
											<div class="collapse" id="collapseExample<?=$film['id']?>">
												<div class="card card-body">
													<form style="padding: 10px;" action="template/modifer.php?id=<?= $film['id']; ?>" method="post" enctype="multipart/form-data">
														<?php include 'template/form.php'; ?>						
													</form>													
												</div>
											</div>
											<?php if ($film['lien'] != null): ?>
												<a class="btn btn-success fa fa-television" role="button" href="<?=$film['lien']?>">
													regarder
												</a>
												<?php else: ?>
													<a class="btn btn-success fa fa-television" role="button" href="https://www.netflix.com">
														regarder
													</a>
												<?php endif ?>

											</div>
										</div>
									</li>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					<div class="card">
						<div class="card-header" id="headingOne">
							<h2 class="mb-0">
								<button class="btn text-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Ajouter un film/série
								</button>
							</h2>
						</div>

						<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="container bg-dark text-light">
								<form style="padding: 10px;" action="template/add.php" method="post" enctype="multipart/form-data">
									<?php include 'template/form.php'; ?>						
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</body>
		<?php include 'template/footer.php'; ?>			