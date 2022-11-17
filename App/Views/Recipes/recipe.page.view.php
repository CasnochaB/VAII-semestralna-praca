<?php
/** @var Array $data */

use App\Models\Recipe;
/** @var Recipe $recipe */
$recipe = $data['recipe']
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
