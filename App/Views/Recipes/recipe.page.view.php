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
            45min
        </div>
        <div class="col center-offset">
            <div>
                hodnotenie
            </div>
        </div>
        <div class="col right-offset">
            <input type="image" src="public/assets/img/heart.svg" alt="Bootstrap" class="recipe-icon recipe-favorite">
        </div>
    </div>
</div>
<div class="container">
