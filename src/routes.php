<?php

use Core\Router;

Router::connect('/',['controller' => 'app' , 'action' => 'index']);
Router::connect('/register',['controller' => 'user' , 'action' => 'add']);
Router::connect('/SC_Project/Project/MVC_PiePHP/user/wash' , ['controller'=>'user','action'=>'register']);
