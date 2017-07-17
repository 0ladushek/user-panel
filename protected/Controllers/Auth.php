<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;
use App\Models\User;

class Auth extends Controller
{
    protected function actionDefault()
    {
        if (isset($_SESSION['token'])) {
            header('Location: /');
            die;
        }

        if (!empty($_POST)) {
            $user = User::checkLoginPas($_POST['login'], $_POST['password']);
            if ($user != false) {
//                setcookie("token", $user->id, time()+3600);
                $_SESSION['token'] = $user->id;
                header('Location: /');
                die;
            }
            else {
                header('Location: /auth');
                die;
            }
        }

        $this->view->display(__DIR__ . '/../../templates/auth.php');
    }
    protected function actionLogOut()
    {
        if(isset($_SESSION['token'])) {
            unset($_SESSION['token']);
        }
        header('Location: /');
        die;
    }
}