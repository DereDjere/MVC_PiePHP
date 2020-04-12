<?php

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
    public function loginpageAction()
    {
        $this->render('login');
    }
    public function articleAction()
    {

    }
    public function loginAction()
    {

        $params = $this->request;
        if ($params['email'] && $params['password'])
        {
            if (!empty($_POST['email']) && !empty($_POST['password']))
            {
                $model = new \Model\UserModel($params);
                if($model->checkmail() === true)
                {
                    if($model->Existmail() === true)
                    {
    
                        $id = $model->UserConnect();
                        if(isset($id))
                        {
                            $params['id'] = $id;
                            $model = new \Model\UserModel($params);
                           /*  var_dump($model->article); */
           
                        }
                        $this->render('show', ['model' => $model]);
                
                    }
                }
            }
        }
    }
    public function Error404()
    {
        $this->render('404');
    }
    public function registerAction()
    {

        $params = $this->request;
        if ($params['email'] && $params['password']) {
            if (!empty($_POST['email']) && !empty($_POST['password'])) {
                $model = new \Model\UserModel($params);
                if ($model->checkmail() === true) {
                    $id = $model->create();
                    var_dump($id);
                    self::$_render = "Votre  compte a ete  cree." . PHP_EOL;
                } else {
                    self::$_render = "Email Invalide." . PHP_EOL;
                }
            }
        } else {
            $this->render('404');
        }
    }
    public function updateAction()
    {
        $params = $this->request;
        if ($params['email']) {
            if (!empty($_POST['email'])) {
                $model = new \Model\UserModel($params);
                $model->update();
                self::$_render = "Votre email a ete  modifier." . PHP_EOL;
            }
        } elseif ($params['password']) {
            if (!empty($_POST['password'])) {
                $model = new \Model\UserModel($params);
                $model->update();
                self::$_render = "Votre mot de passe a ete modifier." . PHP_EOL;
            }
        } else {
        }
    }
    public function disconnectAction()
    {

        session_start();
        session_destroy();
        $this->render('login');
    }
    public function update_pageAction()
    {
        $this->render('update');
    }
}
