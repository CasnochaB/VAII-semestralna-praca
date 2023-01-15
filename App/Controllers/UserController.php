<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{
    public function index(): Response
    {
        return $this->redirect("?c=admin");
    }

    public function loggedUser() : JsonResponse  {
        return $this->json([
            'me' => $this->app->getAuth()->getLoggedUserId()
        ]);
    }
}