<?php

function autoloader($class_name)
{
    
    $file = str_replace('\\','/', $class_name);
    /* echo '<h1>'.$class_name.'</h1>';
    echo "<h2>$file</h2>"; */
    if(file_exists($file.'.php'))
    {   
        /* var_dump($file); */
        echo "<h3>$file</h3>";
        require_once $file . '.php';
    }
    elseif(file_exists('src/Controller/'.$file.'.php')){
        /* echo "<h3>$file</h3>"; */
        require_once 'src/Controller/'.$file.'.php';
    }
    elseif(file_exists('src/'.$file.'.php')){
        /* echo "<h3>$file</h3>"; */
        require_once 'src/'.$file.'.php';
    }
}

function Autoregister()
{
    spl_autoload_register('autoloader');
}

Autoregister();