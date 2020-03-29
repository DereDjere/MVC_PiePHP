<?php

namespace Core;

use Core\Router;

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
                        if ($arrError == count(($arr) -1)) {
                            include "../src/View/Error/404.php";
                        }
                    }
                } else {
                    $arrError += 1;
                    /* echo $arrError; */
                    if ($arrError === count($arr)) {
                        include_once '../src/View/Error/404.php';
                    }
                }
            }
        }
    }
    public function Request()
    {
        if($_POST)
        {
            $secupost = htmlspecialchars(trim(stripslashes($_POST)));
            return $secupost;
        }
        else if($_GET)
        {
            $secuget = htmlspecialchars(trim(stripslashes($_POST)));
            return $secuget;
        }
        
    }
}
