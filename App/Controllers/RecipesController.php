<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Recipe;

class RecipesController extends AControllerBase
{

    /**
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Recipe::getAll()
        ]);
    }

    public function create() {
        return $this->html([
            'recipe' => new Recipe()
        ],
            'recipe.form'
        );
    }

    public function open() {
        return $this->html([
            'recipe' => Recipe::getOne($this->request()->getValue('id'))
        ],
        'recipe.page'
        );
    }

    public function update() {
        return $this->html([
            'recipe' => Recipe::getOne($this->request()->getValue('id'))
        ],
            'recipe.form'
        );
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $recipe = ($id ? Recipe::getOne($id) : New Recipe());

        $recipe->setTitle($this->request()->getValue("title"));
        $recipe->setTime($this->request()->getValue("time"));
        $recipe->setDescription($this->request()->getValue("description"));
        $recipe->setText($this->request()->getValue("text"));
        $recipe->save();

        return $this->redirect("?c=recipes");
    }

    public function delete() {
        $recipe = Recipe::getOne($this->request()->getValue('id'));
        $recipe->delete();

        return $this->redirect("?c=recipes");
    }
}