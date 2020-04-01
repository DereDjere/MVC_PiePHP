<?php

namespace Core;

class Controller
{
    protected static $_render;

    protected  function  render($view, $scope = [])
    {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        var_dump(get_class($this));
        var_dump($view);
        if (file_exists($f)) {
            ob_start();
            include($f);
            var_dump($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }
        /* else
        {
            $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        } */
    }
    public function __destruct() {  
        echo self::$_render;
    }    
}
