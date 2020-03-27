<?php

<<<<<<< HEAD
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
=======
namespace  Core;

class  Core
{
    public  function  run()
    {
        echo  __CLASS__ . " [OK]" . PHP_EOL;
>>>>>>> 9cb7c652b9ff7e6408fb744ae6398436770da5fe
    }
}
