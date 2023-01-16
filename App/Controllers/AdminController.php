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
        $option = $this->request()->getValue('m');
        $message = "";
        if ($option == '1') {
            $message = "Zle heslo";
        } else if ($option == '2') {
            $message = "Hesla sa nezhodujú";
        } else if ($option == '3') {
            $message = "Heslo úspešne zmenené";
        } else if ($option == '4') {
            $message = "Nove heslo musí mať aspoň 5 znakov";
        }
        $recipes = Recipe::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()]);
        $rating = 0;
        foreach ($recipes as $recipe) {
            $rating+=$recipe->getRating();
        }
        return $this->html([
            'commentsCount' => count(Comment::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()])),
            'recipesCount' => count($recipes),
            'ratingCount' => $rating,
            'message' => $message
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
            'comments' => Comment::getAll("id_user = ?",[$this->app->getAuth()->getLoggedUserId()],"id DESC")
        ],'user.comments');
    }

    public function deleteComment(): Response
    {
        $commentID = $this->request()->getValue('id');
        $comment = Comment::getOne($commentID);
        $comment->delete();
        return $this->comments();
    }
}