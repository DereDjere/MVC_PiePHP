<?php

namespace Core;

use Core\Router;
use UserController;

class Core
{

    public  function  run()
    {
        /*  echo  __CLASS__ . " [OK]" . PHP_EOL; */

        // METHODE STATIC


        // METHODE DYNAMIQUE
        $url = $_SERVER["REDIRECT_URL"];
        $arr = explode("/", $url);
        $arrError = 0;
        $route = Router::get($url);
        if ($route != null) {
            $control = ucfirst($route['controller']) . 'Controller';
            $action = $route['action'] . 'Action';
            if (class_exists(ucfirst($control))) {
                if (method_exists($control, $action)) {
                    $controller = new $control();
                    $controller->$action();
                }
            }
        } else {
            for ($i = 0; $i < count($arr); $i++) {
                $class = ucfirst($arr[$i] . "Controller");
                if (class_exists($class)) {
                    $i += 1;
                    $method = $arr[$i] . "Action";
                    if (method_exists($class, $method)) {
                        $controller = new $class();
                        $controller->$method();
                    } else {
                        $arrError += 1;
                        /* echo $arrError; */
                        if ($arrError == count(($arr) - 1)) {
                            echo "test";
                            /* $controller = new Controller\UserController;
                            $controller->Error404(); */
                        }
                    }
                } else {
                    $arrError += 1;
                    /* echo $arrError; */
                    if ($arrError === count($arr)) {
                        echo "test";
                        /* $controller = new UserController;
                        $controller->Error404(); */
                    }
                }
            }
        }
    }
    public function Request()
    {
        if ($_POST) {
            $secupost = array('email' => htmlspecialchars(trim(stripslashes($_POST['email']))),'pwd' => $_POST['pwd']);
            return $secupost;
        } else if ($_GET) {
            $secuget = htmlspecialchars(trim(stripslashes($_POST)));
            return $secuget;
        }
    }
}
