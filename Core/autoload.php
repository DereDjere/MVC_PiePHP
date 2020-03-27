<?php

function autoloader($class_name)
{
    $file = str_replace('\\','/', $class_name);
    
    if(file_exists($file.'.php'))
    {   
        /* var_dump($file); */
        require_once $file . '.php';
    }
    elseif(file_exists('./src/Controller/'.$file.'.php')){
        var_dump($file);
        include './src/Controller/'.$file.'.php';
    }
    elseif(file_exists('./src/Model/'.$file.'.php')){
        var_dump($file);
        include '../src/Controller/'.$file.'.php';
    }
}

function Autoregister()
{
    spl_autoload_register('autoloader');
}

Autoregister();