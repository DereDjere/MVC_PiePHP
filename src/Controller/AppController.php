<?php
/* 
namespace Controller; */

use Core\Controller;
use Core\Core;

class AppController extends Controller
{
    public function __construct()
    {
        $request = Core::Request();
    }

}