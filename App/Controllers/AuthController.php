<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    const PASSWORD_HASH = '$2y$10$GRA8D27bvZZw8b85CAwRee9NH5nj4CQA6PDFMc90pN9Wi4VAWq3yq';
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=home');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect('?c=home');
    }

    public function register(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registered = null;
        if (isset($formData['submitRegister'])) {
            $registered = $this->app->getAuth()->register($formData['login'], $formData['password'],$formData['passwordP']);
            if ($registered) {
                $id = $this->request()->getValue('id');
                $user = ($id ? User::getOne($id) : New User());

                $user->setLogin($this->request()->getValue('login'));
                $password = ($this->request()->getValue('password'));
                $password = password_hash($password,PASSWORD_ARGON2ID);
                $user->setPassword($password);
                $user->save();

                $this->app->getAuth()->login($formData['login'],$formData['password']);
                return $this->redirect('?c=home');
            }
        }

        $data = ($registered === false ? ['message2' => 'Login už existuje,alebo hesla nie su zhodné'] : []);
        return $this->html($data,'login');
    }



}