<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;
use App\Models\User;

class Admin extends Controller
{
    protected function access()
    {
        if (isset($_SESSION['token'])) {
            $user = User::findById($_SESSION['token']);
            if ($user->role == 1) {
                return true;
            }
        }

        return false;

    }

    protected function actionDefault()
    {
        $data = User::findAll();
        $this->view->users = $data;
        $this->view->display(__DIR__ . '/../../templates/admin.php');
    }

    protected function actionEdit()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            $data = User::findById($id);
            $this->view->user = $data;
            $this->view->display(__DIR__ . '/../../templates/edit.php');
        }
    }

    protected function actionAdd()
    {
        $this->view->display(__DIR__ . '/../../templates/add.php');

    }


    protected function actionSave()
    {
        if(!empty($_POST['id'])) {
            $user = User::findById((int) $_POST['id']);
        }
        else {
            $user = new User;
        }

        $user->role = 0;
        foreach ($_POST as $key => $val) {
            if ($key == 'role') {
                $user->$key = 1;
            }
            else {
                $user->$key = $_POST[$key];
            }
        }


        $user->save();

        header('Location: /admin');
        die;
    }

    protected function actionDelete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $article = new User;
            $article->id = $id;
            $article->delete();
        }

        header('Location: /admin');
        die;
    }
}