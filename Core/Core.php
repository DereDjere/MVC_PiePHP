<?php

namespace Core;

/* use Core\Router; */


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
            echo $control . '<br>';
            echo $action . '<br>';
            /* var_dump(class_exists(ucfirst($control))); */
        
            if (class_exists(ucfirst($control))) {
                
                if (method_exists($control, $action)) {
                    /* echo "method exist"; */
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
                        /* echo "method exist"; */
                        $controller = new $class();
                        $controller->$method();
                    } else {
                        $arrError += 1;
                        /* echo $arrError; */
                        if ($arrError == count(($arr) - 1)) {
                            echo "404";
                            /* $controller = new Controller\UserController;
                            $controller->Error404(); */
                        }
                    }
                } else {
                    $arrError += 1;
                    /* echo $arrError; */
                    if ($arrError === count($arr)) {
                        echo "404";
                        /* $controller = new UserController;
                        $controller->Error404(); */
                    }
                }
            }
        }
    }
    
}
