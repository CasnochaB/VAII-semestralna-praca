<?php
/** @var Array $data */

use App\Models\Recipe;

/** @var Recipe $recipe */
$recipe = $data['recipe'];
?>

<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie príspevku</h3>
            <form action="?c=posts&a=store" method="post">
                <input type="hidden" value="<?= $recipe->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="title" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?= $recipe->getTitle() ?>">
                </div>
                <div class="mb-3">
                    <label for="text">Obsah:</label>
                    <textarea class="form-control" id="text" name="text" style="height: 100px"><?= $recipe->getText() ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Odoslať príspevok</button>
            </form>
        </div>
    </div>
</div>
