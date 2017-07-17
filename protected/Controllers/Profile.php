<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.07.2017
 * Time: 6:56
 */

namespace App\Controllers;


use App\Controller;
use App\Models\User;

class Profile extends Controller
{
    protected function actionDefault()
    {
        if(!empty($_SESSION['token'])) {
            $data = User::findById($_SESSION['token']);
            $this->view->user = $data;
            $this->view->display(__DIR__ . '/../../templates/profile.php');
        }
        else {
            header('Location: /');
            die;
        }
    }

    protected function actionSave()
    {
        if(!empty($_POST['id'])) {
            $user = User::findById((int) $_POST['id']);

            $user->fill($_POST);

            $user->save();
        }

        header('Location: /profile');
        die;
    }
}