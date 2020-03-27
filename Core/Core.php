<?php

<<<<<<< HEAD
namespace Core;

=======

namespace Core;
>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
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
<<<<<<< HEAD
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
=======

        $url = $_SERVER["REDIRECT_URL"];

        $arr = explode("/", $url);

        /* var_dump($arr); */
        $class = ucfirst($arr[4] . "Controller");
        $method = $arr[5] . "Action";
        /* var_dump(class_exists($class)); */
        /* echo "$class -> $method"; */
        $controller = new $class();
        $controller->$method();
        /* var_dump($controller); */

        /* $i = 0;
        while ($i < count($arr)) {
            if (class_exists($arr[$i])) {
                $class = ucfirst($arr[$i] . "Controller");
                if (method_exists($class, $arr[$i])) {
                    $method = $arr[$i] . "Action";
                    echo "$class -> $method";
                    $controller = new $class();
                    $controller->$method();
                } else {
                    $i++;
                }
            } else {
                $i++;
            }
        } */

>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
