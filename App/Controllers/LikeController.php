<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class LikeController extends AControllerBase
{

    public function index(): Response
    {
        return $this->redirect("?c=admin");
    }
}