<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;
use App\Models\User;

class Main extends Controller
{
    protected function actionDefault()
    {
        switch (@$_GET['short']) {
            case 'login':
                $data = User::shortByLogin();
                break;
            case 'name':
                $data = User::shortByName();
                break;
            case 'email':
                $data = User::shortByEmail();
                break;
            case 'adminOnly':
                $data = User::filterByAdminOnly();
                break;
            default:
                $data = User::findAll();
                break;
        }
        $this->view->users = $data;
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    protected function actionOne()
    {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];

            $data = User::findById($id);
            if(empty($data)) {
                throw new NotFoundException;
            }
            $this->view->user = $data;
            $this->view->display(__DIR__ . '/../../templates/user.php');
        }
        else {
            throw new \Exception('Не передан get параметр');
        }
    }



}