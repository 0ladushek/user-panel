<?php

namespace App;

use \App\View;
use \App\Models\User;

abstract class Controller
{
    protected $view;

    public function  __construct()
    {
        $this->view = new View;
        session_start();
        if (!empty($_SESSION['token'])) {
            $this->view->profile = User::findById($_SESSION['token']);
        }
    }

    protected function access()
    {
        return true;
    }
    public function action($name)
    {
        $methodName = 'action'. $name;
        if ($this->access()) {
            return $this->$methodName();
        }
        else {
            header("Location: /auth");
            die();
        }
    }
}