<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
/** @var \App\Models\Like $like */
?>
<script src="public/js/scriptLike.js"></script>

<div class="container row row-recipe">
    <?php /*if ($auth->isLogged()) { */?><!--
		<div class="container center-offset">
			<a href="?c=recipes&a=create" class="btn btn-primary" style = "background-color: green; width: 40%">Pridať nový recept</a>
		</div>
	--><?php /*} */?>
    <?php if (count($data['data']) > 0) {
		foreach ($data['data'] as $like) { $recipe = $like->getAssociatedRecipe() ?>
            <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
    <?php }} else {	?>
	<h1> Zatiaľ nemáte žiadne obľúbené recepty</h1>
<?php }  ?>
