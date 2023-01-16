<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
$favorite = $data['favorite'];
$new = $data['new'];
$i = 0;
?>
<div class="container-lg navbar-align">
	<div class="input-group" >
		<label for="search_text"></label>
		<input type="search" id="search_text" class="form-control" />
		<button type="submit" class="btn btn-outline-dark navbar-text">
			<img src="public/assets/img/search.svg" alt="Bootstrap" width="32" height="32">
			hľadať
		</button>
	</div>
</div>

<div class="spacing"></div>
<div class="container">
	<h1>
		Nové
	</h1>
	<div class="border container row">
		<?php foreach ($new as $recipe) { if($i > 3) break; ?>
			<div class="card recipe-card">
				<img class="card-img-top fixed-aspect" src="public/assets/recepty/default.png" alt="Card image">
				<div>
					<div class="recept col" style="width: 60%; float: left">
						<h4 class="card-title"><?=  $recipe->getTitle() ?></h4>
						<div>
							<p class="card-text"> <?= $recipe->getDescription() ?> </p>
							<img class="recipe-icon" src="public/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px">
                            <?= $recipe->getTime() ?> min.
						</div>
					</div>

                    <?php if ($auth->isLogged()) { ?>
                        <?php if($recipe->getIdUser() != $auth->getLoggedUserId()) { ?>
							<div class="center-offset" style="width: 40%;margin-top: 5%; float: right">
								<a href="?c=recipes&a=like&id=<?= $recipe->getId() ?>">
									<img style="width: 50%"
                                        <?php if($recipe->isLiked($auth->getLoggedUserId(),$recipe->getId())) { ?>
											src="public/assets/img/heart-fill.svg"
                                        <?php } else { ?>
											src="public/assets/img/heart.svg"
                                        <?php }  ?>
									>
								</a>
							</div>
                        <?php } ?>
                    <?php } ?>
				</div>

				<div class="recipe" style="margin-bottom: 10px">
					<a href="?c=recipes&a=open&id=<?=$recipe->getId()?>" class="btn btn-primary">Otvoriť recept</a>
                    <?php if($auth->isLogged() && $auth->getLoggedUserId() == $recipe->getIdUser()) { ?>
						<a href="?c=recipes&a=update&id=<?=$recipe->getId()?>" style="background-color: rgba(242,255,111,0.91)" class="btn btn-primary">Upraviť </a>
						<a href="?c=recipes&a=delete&id=<?=$recipe->getId()?>" style="background-color: red" class="btn btn-primary">Odstrániť </a>
                    <?php }	?>
				</div>
			</div>
        <?php $i++; } $i=0;	?>
	<div class="spacing"></div>
	<h1>Obľúbené</h1>
	<div class="border container row">
        <?php foreach ($favorite as $recipe) { if($i > 3) break;?>
			<div class="card recipe-card">
				<img class="card-img-top fixed-aspect" src="public/assets/recepty/default.png" alt="Card image">
				<div>
					<div class="recept col" style="width: 60%; float: left">
						<h4 class="card-title"><?=  $recipe->getTitle() ?></h4>
						<div>
							<p class="card-text"> <?= $recipe->getDescription() ?> </p>
							<img class="recipe-icon" src="public/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px">
                            <?= $recipe->getTime() ?> min.
						</div>
					</div>

                    <?php if ($auth->isLogged()) { ?>
                        <?php if($recipe->getIdUser() != $auth->getLoggedUserId()) { ?>
							<div class="center-offset" style="width: 40%;margin-top: 5%; float: right">
								<a href="?c=recipes&a=like&id=<?= $recipe->getId() ?>">
									<img style="width: 50%"
                                        <?php if($recipe->isLiked($auth->getLoggedUserId(),$recipe->getId())) { ?>
											src="public/assets/img/heart-fill.svg"
                                        <?php } else { ?>
											src="public/assets/img/heart.svg"
                                        <?php }  ?>
									>
								</a>
							</div>
                        <?php } ?>
                    <?php } ?>
				</div>

				<div class="recipe" style="margin-bottom: 10px">
					<a href="?c=recipes&a=open&id=<?=$recipe->getId()?>" class="btn btn-primary">Otvoriť recept</a>
                    <?php if($auth->isLogged() && $auth->getLoggedUserId() == $recipe->getIdUser()) { ?>
						<a href="?c=recipes&a=update&id=<?=$recipe->getId()?>" style="background-color: rgba(242,255,111,0.91)" class="btn btn-primary">Upraviť </a>
						<a href="?c=recipes&a=delete&id=<?=$recipe->getId()?>" style="background-color: red" class="btn btn-primary">Odstrániť </a>
                    <?php }	?>
				</div>
			</div>
        <?php $i++;} $i=0;	?>
	</div>
</div>
<div class="container spacing"></div>

