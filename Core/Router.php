<?php
namespace Router;

class Router
{
    private static $routes ;

    public static function connect ( $url , $route )
    {   
    self::$routes[$url]=$route ;
    }

    public static function get($url)
    {
        
    }
}
