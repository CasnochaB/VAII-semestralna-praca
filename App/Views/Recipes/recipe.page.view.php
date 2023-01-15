<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
use App\Models\Recipe;
/** @var Recipe $recipe */
$recipe = $data['recipe'];
?>

<script>var recipeID = "<?php Print($recipe->getId()) ?>"; </script>
<script src="public/js/script_comments.js">

</script>

<h1 id="recipe-id" value="<?=$recipe->getTitle()?>">
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
				hodnotenie: <?= $recipe->getRating()?>
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

<?php if($auth->isLogged()) { ?>
<div class="container">
	<h2 class="center-offset">Pridať komentár</h2>
	<div class="container center-offset">
		<div class="mb-3">
			<label for="text"></label>
			<textarea class="form-control center-div" id="comment-text" name="text" style="max-width: 60%" placeholder="Tu napíšte váš komentár!" required></textarea>
		</div>
		<button style="margin-top: 10px" id="send-comment" class="btn btn-primary">Odoslať</button>
	</div>
</div>
<hr>
<?php } ?>

<div class="container" >
	<h2>Komentáre</h2>
</div>
<hr>

<div id="comments">

</div>

<div class="spacing"></div>