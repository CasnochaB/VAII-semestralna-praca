<?php

namespace App\Auth;

use App\Core\DB\Connection;

class AnyLoginAuthenticator extends DummyAuthenticator
{

    public function login($login, $password): bool
    {
        Connection::connect();
        if ($login == $password) {
            $_SESSION['user'] = $login;
            return true;
        }
        return false;
    }
}