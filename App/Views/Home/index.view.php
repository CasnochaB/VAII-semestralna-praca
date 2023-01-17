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
            <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
        <?php $i++; } $i=0;	?>
	<div class="spacing"></div>
	<h1>Obľúbené</h1>
	<div class="border container row">
        <?php foreach ($favorite as $recipe) { if($i > 3) break;?>
            <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
        <?php $i++;} $i=0;	?>
	</div>
</div>
<div class="container spacing"></div>

