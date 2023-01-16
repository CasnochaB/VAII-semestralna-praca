<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
?>

<div class="container row row-recipe border border-3">
	<div class="container center-offset">
		<a href="?c=recipes&a=create" class="btn btn-primary" style = "background-color: green; width: 40%">Pridať nový recept</a>
	</div>
    <?php foreach ($data['data'] as $recipe) {
		if ($recipe->getIdUser() == $auth->getLoggedUserId()) {
		?>
			<div class="card recipe-card">
				<img class="card-img-top fixed-aspect" src="public/assets/recepty/default.png" alt="Card image">
				<div class="recept">
					<h4 class="card-title"><?=  $recipe->getTitle() ?></h4>
					<div>
						<p class="card-text"> <?= $recipe->getDescription() ?> </p>
						<img class="recipe-icon" src="public/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px">
                        <?= $recipe->getTime() ?> min.
					</div>
					<a href="?c=recipes&a=open&id=<?=$recipe->getId()?>" class="btn btn-primary">Otvoriť recept</a>

                    <?php if($auth->isLogged() && $auth->getLoggedUserId() == $recipe->getIdUser()) { ?>
						<a href="?c=recipes&a=update&id=<?=$recipe->getId()?>" style="background-color: rgba(242,255,111,0.91)" class="btn btn-primary">Upraviť </a>
						<a href="?c=recipes&a=delete&id=<?=$recipe->getId()?>" style="background-color: red" class="btn btn-primary">Odstrániť </a>
                    <?php }	?>
				</div>
			</div>
	<?php } }	?>
