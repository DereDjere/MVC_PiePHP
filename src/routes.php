<?php

Router :: connect ('/',['controller' => 'app' , 'action' => 'index']);
Router :: connect ('/register',['controller' => 'user' , 'action' => 'add']);
Router :: connect ('SC_Project/Project/MVC_PiePHP/user/toz' , [ 'controller' => 'user' , 'action' => 'register']);