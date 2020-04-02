<?php

/* namespace Controller; */

/* use Core\Controller;
use Core\Core; */
/* use Core\Entity; */
/* use Model\UserModel; */

class UserController extends \Core\Controller
{

    public function __construct()
    {
        $this->request = \Core\Request::Request();

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
      
        $params = $this->request;
        /* var_dump($params); */
        if ($params['email'] && $params['password']) {
            
            $model = new \Model\UserModel($params);
        
        }
        elseif(empty($_POST['email']) && empty($_POST['paswword']))
        {
            $this->render('register');
        }
    }
}
