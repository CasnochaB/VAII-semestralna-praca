<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Recipe;
use App\Models\User;

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
            'recipe' => Recipe::getOne($this->request()->getValue('id')),
            'comments' => Comment::getAll("id_recipe = ?",[$this->request()->getValue('id')])
        ],
        'recipe.page'
        );
    }

    public function update() {
        $recipe = $this->html([
            'recipe' => Recipe::getOne($this->request()->getValue('id'))
        ],
            'recipe.form'
        );
        return $recipe;
    }

    public function store() {
        $id = $this->request()->getValue('id');
        $recipe = ($id ? Recipe::getOne($id) : New Recipe());

        $recipe->setTitle($this->request()->getValue("title"));
        $recipe->setTime($this->request()->getValue("time"));
        $recipe->setDescription($this->request()->getValue("description"));
        $recipe->setText($this->request()->getValue("text"));
        $recipe->setIdUser($this->app->getAuth()->getLoggedUserId());
        $recipe->save();

        return $this->redirect("?c=admin");
    }

    public function delete() {
        $recipe = Recipe::getOne($this->request()->getValue('id'));
        $recipe->delete();

        return $this->redirect("?c=admin");
    }

    public function like() : Response {

        $recipeId = $this->request()->getValue('id');
        $likes = Like::getAll("id_recipe = ? && id_user= ?", [$recipeId, $this->app->getAuth()->getLoggedUserId()]);
        if (count($likes) == 0) {
            $like = new Like();
            $like->setIdUser($this->app->getAuth()->getLoggedUserId());
            $like->setIdRecipe($this->request()->getValue('id'));
            $like->save();
        } else if (count($likes) == 1) {
            $likes[0]->delete();
        } else {
            throw new \Exception("One post can't have more than one like from the same user.");
        }

        return $this->redirect("?c=recipes");
    }

    public function comment() {
        $recipeId = $this->request()->getValue("id");
        $comment = new Comment();
        $comment->setIdRecipe($recipeId);
        $comment->setIdUser($this->app->getAuth()->getLoggedUserId());
        $comment->setText($this->request()->getValue("text"));
        $comment->save();

        return $this->html([
            'recipe' => Recipe::getOne($recipeId),
            'comments' => Comment::getAll("id_recipe = ?",[$this->request()->getValue('id')])
        ],
            'recipe.page'
        );
    }

    public function favorite() : Response {
        $userId = $this->request()->getValue('id');
        return $this->html([
            'data' => Like::getAll("id_user = ?",[$userId])
        ],
            'recipe.favorite'
        );
    }
}