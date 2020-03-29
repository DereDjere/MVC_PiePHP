<?php

/* namespace Controller; */

use Core\Controller;
use Core\Core;
use UserModel\UserModel;

class UserController extends Controller{
    
    public function __construct()
    {
        $request = Core::Request();
    }

    public function registerAction()
    {
        $model = new UserModel;
        $model->save($_POST['email'],$_POST['password']);
        
    }

    
}