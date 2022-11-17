<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Recipe;

class RecipesController extends AControllerBase
{

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
}