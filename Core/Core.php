<?php

namespace Core;

class Core
{

    public  function  run()
    {
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
                        if ($arrError == count(($arr) - 1)) {
                            echo "404";
                        }
                    }
                } else {
                    $arrError += 1;
                    if ($arrError === count($arr)) {
                        echo "404";
    
                    }
                }
            }
        }
    }
    
}
