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
            <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
	<?php } }	?>
