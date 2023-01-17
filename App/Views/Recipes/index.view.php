<?php
/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Recipe $recipe */
?>


<div class="container row row-recipe border border-3">

    <?php foreach ($data['data'] as $recipe) { ?>
        <?php include(dirname(__FILE__)."/../Recipes/recipe.card.view.php"); ?>
    <?php }	?>
</div>