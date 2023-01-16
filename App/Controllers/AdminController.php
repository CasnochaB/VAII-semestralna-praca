<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Comment;
use App\Models\Recipe;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        $recipes = Recipe::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()]);
        $rating = 0;
        foreach ($recipes as $recipe) {
            $rating+=$recipe->getRating();
        }
        return $this->html([
            'commentsCount' => count(Comment::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()])),
            'recipesCount' => count($recipes),
            'ratingCount' => $rating
            ]);
    }

    public function recipes(): Response
    {
        return $this->html([
            'data' => Recipe::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()])
        ],'user.recipes');
    }


    public function comments(): Response
    {
        return $this->html([
            'comments' => Comment::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()])
        ],'user.comments');
    }
}