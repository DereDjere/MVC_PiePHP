<?php

/* namespace Controller; */

use Core\Controller;
use Core\Core;
use Core\Entity;
use Model\UserModel;

class UserController extends Controller
{

    public function __construct()
    {
        $request = Core::Request();
    }

    public function registerpageAction()
    {   
        $this->render('register');
    }
    public function indexAction()
    {
        $this->render('index');
    }
    public function loginAction()
    {
        $this->render('login');
    }
    public function registerAction()
    {
        if ($_POST['email'] && $_POST['password']) {
            $model = new UserModel($_POST);
            $model->checkMail($_POST['email']);
            $model->save($_POST['email'], $_POST['password']);
            $model->create();
            $this->render('post');
        }
        elseif(empty($_POST['email']) && empty($_POST['password']))
        {
            $this->render('register');
        }
    }
}
