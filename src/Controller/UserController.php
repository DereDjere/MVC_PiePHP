<?php

/* namespace Controller; */

use Core\Controller;
use Core\Core;
/* use Core\Entity; */
use Model\UserModel;

class UserController extends Controller
{

    public function __construct()
    {
        $this->request = Core::Request();

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
    public function Error404()
    {
        $this->render('404');
    }
    public function registerAction()
    {
        echo "RegisterActionPAGE";
        /* var_dump($_POST); */
        $params = $this->request;
        if ($params['email'] && $params['pwd']) {
            echo 'entrer';
            $model = new UserModel($params);
            /* $model->checkMail($_POST['email']); */
            $model->save($params['email'], $params['pwd']);
            $model->create();
        }
        elseif(empty($_POST['email']) && empty($_POST['pwd']))
        {
            $this->render('register');
        }
    }
}
