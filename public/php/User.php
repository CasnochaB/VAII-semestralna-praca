<?php

namespace public\php;
class User extends \App\Core\Model
{
    public $id;
    public $login;
    public $hash;

    private bool $isLogged = false;


    static public function setDbColumns()
    {
        return ['id', 'login', 'hash'];
    }

    static public function setTableName()
    {
        return "users";
    }

    public function logIn(string $login, string $hash)
    {
        if ($login == $this->login && $hash == $this->hash) {
            $_SESSION["user"] = $this->login;
        }
    }
}