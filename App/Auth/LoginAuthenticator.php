<?php

namespace App\Auth;

use App\Models\User;

class LoginAuthenticator extends DummyAuthenticator
{
    public function login($login, $password): bool
    {
        $users = User::getAll();
        foreach ($users as $user) {
            if ($user->getLogin() == $login) {
                if (password_verify($password,$user->getPassword())) {
                    $_SESSION['user'] = $login;
                    return true;
                } else {
                    return false;
                }
            }
        }
        return false;
    }

    public function getLoggedUserId(): mixed
    {
        $login = $_SESSION['user'];
        $user = User::getAll("login = ?",[$login]);
        return $user[0]->getId();
    }
}