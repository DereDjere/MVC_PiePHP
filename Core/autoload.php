<?php

function autoloader($class_name)
{
    
    $file = str_replace('\\','/', $class_name);
    if(file_exists($file.'.php'))
    {   

        echo "<h3>$file</h3>";
        require_once $file . '.php';
    }
    elseif(file_exists('src/Controller/'.$file.'.php')){

        require_once 'src/Controller/'.$file.'.php';
    }
    elseif(file_exists('src/'.$file.'.php')){
        require_once 'src/'.$file.'.php';
    }
}

function Autoregister()
{
    spl_autoload_register('autoloader');
}

Autoregister();