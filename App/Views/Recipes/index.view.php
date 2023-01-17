<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
?>


<div class="container row row-recipe border border-3">
	<?php /*if ($auth->isLogged()) { */?><!--
		<div class="container center-offset">
			<a href="?c=recipes&a=create" class="btn btn-primary" style = "background-color: green; width: 40%">Pridať nový recept</a>
		</div>
	--><?php /*} */?>
    <?php foreach ($data['data'] as $recipe) { ?>
        <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
    <?php }	?>


</div>