
<div class="card recipe-card">
			<img class="card-img-top fixed-aspect" src="public/assets/recepty/default.png" alt="Card image">
			<div>
				<div class="recept col" style="width: 60%; float: left">
					<h4 class="card-title"><?=  $recipe->getTitle() ?></h4>
<div class="row">

    <p class="card-text"> <?= $recipe->getDescription() ?> </p>
    <div class="col">
        <img class="recipe-icon" src="public/assets/img/clock.svg" alt="icon" style="margin-bottom: 10px">
        <?= $recipe->getTime() ?> min.
    </div>
    <div class="col container center-offset verc">
        pači sa: <?=$recipe->getRating()?>
    </div>
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