<?php

namespace Core;

use Router;

class Core
{
    public function __construct()
    {
        require_once('src/routes.php');
    }
    public  function  run()
    {
        /* echo  __CLASS__ . " [OK]" . PHP_EOL; */

        // METHODE STATIC


        // METHODE DYNAMIQUE
        $url = $_SERVER["REDIRECT_URL"];
        $arr = explode("/", $url);
        $arrError = 0;
        if ($route = Router::get($url) != null) {
            $control = $route['controller'];
            $action = $route['action'];
            var_dump($action);
            var_dump($control);
            if (class_exists($control)) {
                if (method_exists($control, $action)) {
                    $controller = new $control();
                    $controller->$action();
                }
            }
        } /* else {
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
                        if ($arrError == count(($arr) -1)) {
                            include "../src/View/Error/404.php";
                        }
                    }
                } else {
                    $arrError += 1;
                    if ($arrError == count($arr)) {
                        include "../src/View/Error/404.php";
                    }
                }
            }
        } */
    }
}
