<?php
/** @var Array $data */

use App\Models\Recipe;

/** @var Recipe $recipe */
$recipe = $data['recipe'];
?>

<div class="container">
    <div class="row>">
        <div class="col">
            <h3>Editácia/pridanie receptu</h3>
            <form action="?c=recipes&a=store" method="post">
                <input type="hidden" value="<?= $recipe->getId() ?>" name="id">
                <div class="mb-3">
                    <label for="title" class="form-label">Názov:</label>
                    <input type="text" class="form-control" id="title" name="title" aria-describedby="title" value="<?= $recipe->getTitle() ?>">
                </div>
				<div class="mb-3">
					<label for="time">Čas prípravy(min):</label>
					<input type="number" class="form-control" id="time" name="time" aria-describedby="time" value="<?= $recipe->getTime() ?>">
				</div>
				<div class="mb-3">
					<label for="description">Krátky opis:</label>
					<textarea class="form-control" id="description" name="description" style="height: 100px"><?= $recipe->getDescription() ?></textarea>
				</div>
                <div class="mb-3">
                    <label for="text">Obsah:</label>
                    <textarea class="form-control" id="text" name="text" style="height: 200px"><?= $recipe->getText() ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Odoslať recept</button>
            </form>
        </div>
    </div>
</div>
