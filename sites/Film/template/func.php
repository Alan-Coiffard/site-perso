<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
				<div class="container bg-dark text-light">
					<form style="padding: 10px;" action="template/add.php" method="post" enctype="multipart/form-data">
						<li class="list-group-item bg-dark">
							<div class="media">
								<a href="image/mini/<?= $select['grande']?>" data-size="1600x1067">
									<img src="image/mini/<?= $select['miniature'] ?>" class="mr-3" >
								</a>
								<div class="media-body">
									<h5><?= $select['titre']; ?></h5>
									<br>
									<?php if ($select['resume'] != null): ?>
										<p class="text-justify"><?= $select['resume']; ?></p>
									<?php else: ?>
										<p>Il n'y a pas encore de résumé</p>					
									<?php endif ?>
								</div>
							</div>
						</li>						
					</form>
				</div>
			</div>