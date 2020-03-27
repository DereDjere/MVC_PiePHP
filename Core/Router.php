<?php
<<<<<<< HEAD
=======
namespace Router;
>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d

class Router
{
    private static $routes ;

    public static function connect ( $url , $route )
    {   
    self::$routes[$url]=$route ;
    }

    public static function get($url)
    {
<<<<<<< HEAD
        return array_key_exists($url, self::$routes) ? self::$routes[$url] : null;
=======
        
>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
    }
}
