<?php

use Core\Router;

Router::connect('/',['controller' => 'app' , 'action' => 'index']);
Router::connect('/register',['controller' => 'user' , 'action' => 'add']);
Router::connect('/SC_Project/Project/MVC_PiePHP/register' , ['controller'=>'user','action'=>'registerpage']);
Router::connect('/SC_Project/Project/MVC_PiePHP/index' , ['controller'=>'user','action'=>'index']);
Router::connect('/SC_Project/Project/MVC_PiePHP/login' , ['controller'=>'user','action'=>'loginpage']);
Router::connect('/SC_Project/Project/MVC_PiePHP/user/register' , ['controller'=>'user','action'=>'register']);
Router::connect('/SC_Project/Project/MVC_PiePHP/user/login' , ['controller'=>'user','action'=>'login']);
Router::connect('/SC_Project/Project/MVC_PiePHP/display' , ['controller'=>'user','action'=>'display']);
Router::connect('/SC_Project/Project/MVC_PiePHP/disconnected' , ['controller'=>'user','action'=>'disconnect']);
Router::connect('/SC_Project/Project/MVC_PiePHP/user/update' , ['controller'=>'user','action'=>'update']);
Router::connect('/SC_Project/Project/MVC_PiePHP/user/updatepage' , ['controller'=>'user','action'=>'update_page']);