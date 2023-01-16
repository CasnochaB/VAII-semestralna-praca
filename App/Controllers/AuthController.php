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

    public static function hash($password): string
    {
        return password_hash($password,PASSWORD_ARGON2ID);
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
        $message = "";
        if (strlen($formData['Rpassword']) < 5 || strlen($formData['RpasswordP']) < 5) {
            $message = "Heslo musi mať aspon 5 znakov";
        } else {
            if (isset($formData['submitRegister'])) {
                $message = "uspesne registrovany";
                if (strlen($formData['Rlogin']) < 5) {
                    $message = "Login musi mat aspon 5 znakov";
                } else {
                    if (count(User::getAll('login = ?', [$formData['Rlogin']])) > 0) {
                        $message = "Login už existuje";
                    } else {
                        $registered = $this->app->getAuth()->register($formData['Rlogin'], $formData['Rpassword'], $formData['RpasswordP']);
                        if ($registered) {
                            $id = $this->request()->getValue('id');
                            $user = ($id ? User::getOne($id) : new User());

                            $user->setLogin($this->request()->getValue('Rlogin'));
                            $password = ($this->request()->getValue('Rpassword'));
                            $password = self::hash($password);
                            $user->setPassword($password);
                            $user->save();

                            $this->app->getAuth()->login($formData['Rlogin'], $formData['Rpassword']);
                            return $this->redirect('?c=home');
                        } else {
                            $message = "hesla sa nezhoduju";
                        }
                    }
                }
            }
        }

        $data = ['message2' => $message];
        return $this->html($data, 'login');

    }

    public function resetPassword(): Response
    {
        $data = '0';
        $formData = $this->app->getRequest()->getPost();
        if (isset($formData['resetPassword'])) {
            $data = '3';
            $userID = $this->app->getAuth()->getLoggedUserId();
            $user = User::getOne($userID);
            if (strlen($formData['newP']) < 5 || strlen($formData['conP']) < 5) {
                $data = '4';
            } else {
                if ($formData['newP'] === $formData['conP']) {
                    if (password_verify(($formData['oldP']), $user->getPassword())) {
                        $user->setPassword(self::hash($formData['newP']));
                        $user->save();
                    } else {
                        $data = '1';
                    }
                } else {
                    $data = '2';
                }
            }
        }
        return $this->redirect('?c=admin&m=' . $data);
    }

    public function deleteAccount() : Response
    {
        $user = User::getOne($this->app->getAuth()->getLoggedUserId());
        $user->delete();
        return $this->logout();
    }
}