<?php
/** @var Array $data */

use App\Models\Recipe;
/** @var Recipe $recipe */
$recipe = $data['recipe'];
/** @var \App\Models\Comment $comments */
$comments = $data['comments'];
/** @var \App\Models\Comment $comment */
?>
<h1>
    <?= $recipe->getTitle()?>
</h1>
<div class="container ">
    <img src="public/assets/recepty/pizza.png" alt="none" class="recipe-image fixed-aspect">
</div>
<div class="container" style="height: 20px"></div>
<div class="container">
    <div class="row" >
        <div class="col left-offset">
            <img src="public/assets/img/clock-fill.svg" alt="Bootstrap" class="recipe-icon">
            <?= $recipe->getTime()?> min.
        </div>
        <div class="col center-offset">
            <div>
				hodnotenie: <?= $recipe->getRating()?> z 5
            </div>
        </div>
        <div class="col right-offset">
            <input type="image" src="public/assets/img/heart.svg" alt="Bootstrap" class="recipe-icon recipe-favorite">
        </div>
    </div>
</div>
<div class="container border" style="word-spacing: normal; background-color: rgba(240,248,255,0.54)">
	<p style="">"<?= $recipe->getText() ?>"</p>
</div>

<div class="spacing"></div>

<form action="?c=recipes&a=comment&id=<?=$recipe->getId()?>" method="post" class="container">
	<h2 class="center-offset">Pridať komentár</h2>
	<div class="container center-offset">
		<div class="mb-3">
			<label for="text"></label>
			<textarea class="form-control center-div" id="text" name="text" style="max-width: 60%" placeholder="Tu napíšte váš komentár!" required></textarea>
		</div>
		<button style="margin-top: 10px" type="submit" class="btn btn-primary">Odoslať</button>
	</div>
</form>
<hr>
<div class="container" >
	<h2>Komentáre</h2>
</div>
<hr>
<?php foreach ($comments as $comment) { ?>
<div class="container" >
	<div class="row">
		<div class="col comment-container border">
			<a class="navbar-brand comment-profile-link" href="#" style="color: #ff9852">
				<img src="public/assets/img/person-circle.svg" alt="Bootstrap" width="32" height="32">
				<?=\App\Models\User::getOne($comment->getIdUser())->getLogin()?>
			</a>
			<hr>
			<?=$comment->getText()?>
			<hr>
		</div>
	</div>
</div>
<?php } ?>
