<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
/** @var \App\Models\Like $like */
?>


<div class="container row row-recipe border border-3">
    <?php /*if ($auth->isLogged()) { */?><!--
		<div class="container center-offset">
			<a href="?c=recipes&a=create" class="btn btn-primary" style = "background-color: green; width: 40%">Pridať nový recept</a>
		</div>
	--><?php /*} */?>
    <?php foreach ($data['data'] as $like) { $recipe = $like->getAssociatedRecipe() ?>
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
                <div class="center-offset" style="width: 40%;margin-top: 5%; float: right">
                    <a href="?c=recipes&a=like&id=<?= $recipe->getId() ?>">
                        <img style="width: 50%"
                            <?php if($recipe->isLiked($auth->getLoggedUserId(),$recipe->getId())) { ?>
                                src="public/assets/img/heart.svg"
                            <?php } else { ?>
                                src="public/assets/img/heart-fill.svg"
                            <?php } ?>
                        >
                    </a>
                </div>
            </div>
            <div class="recipe" style="margin-bottom: 10px">
                <a href="?c=recipes&a=open&id=<?=$recipe->getId()?>" class="btn btn-primary">Otvoriť recept</a>
                <?php if($auth->isLogged() && $auth->getLoggedUserId() == $recipe->getIdUser()) { ?>
                    <a href="?c=recipes&a=update&id=<?=$recipe->getId()?>" style="background-color: rgba(242,255,111,0.91)" class="btn btn-primary">Upraviť </a>
                    <a href="?c=recipes&a=delete&id=<?=$recipe->getId()?>" style="background-color: red" class="btn btn-primary">Odstrániť </a>
                <?php }	?>
            </div>
        </div>
    <?php }	?>

