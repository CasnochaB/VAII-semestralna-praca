<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Model;
use App\Core\Responses\JsonResponse;
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
        $recipe = Recipe::getOne($recipeId);

        if (count($likes) == 0) {
            $like = new Like();
            $like->setIdUser($this->app->getAuth()->getLoggedUserId());
            $like->setIdRecipe($this->request()->getValue('id'));
            $like->save();
            $recipe->setRating($recipe->getRating()+1);
            Model::setDbColumns(['id','rating']);
        } else if (count($likes) == 1) {
            $likes[0]->delete();
            $recipe->setRating($recipe->getRating()-1);
        } else {
            throw new \Exception("One recipe can't have more than one like from the same user.");
        }
        $recipe->save();
        return $this->redirect("?c=recipes");
    }

    public function comment() {

        $data = json_decode(file_get_contents('php://input'));

        $comment = new Comment();
        $comment->setText($data->text);
        $comment->setIdUser($this->app->getAuth()->getLoggedUserId());
        $comment->setIdRecipe($data->recipe);

//        $message = new Message($data->message, $this->app->getAuth()->getLoggedUserId(), $userToId);
//        $message->save();

        $comment->save();

        return $this->json('ok');


        /*$recipeId = $this->request()->getValue("id");
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
        );*/
    }

    public function favorite() : Response {
        $userId = $this->request()->getValue('id');
        return $this->html([
            'data' => Like::getAll("id_user = ?",[$userId])
        ],
            'recipe.favorite'
        );
    }

    public function getComments() :JsonResponse
    {
        $recipeID = $this->request()->getValue('id');
        $comments = Comment::getAll('id_recipe = ?',[$recipeID],'id DESC');
        array_map(function ($comment) {
            $comment->loadUser();
        }, $comments);

        return $this->json($comments);
    }

    public function deleteComment() {

        $commentID = $this->request()->getValue('idc');
        $comment = Comment::getOne($commentID);
        $comment->delete();
        return $this->html([
            'recipe' => Recipe::getOne($this->request()->getValue('idr')),
        ],
            'recipe.page'
        );
    }
}