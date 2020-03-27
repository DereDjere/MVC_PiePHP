<?php

<<<<<<< HEAD
=======

>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
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
<<<<<<< HEAD
        include '../src/Controller/'.$file.'.php';
=======
        include './src/Model/'.$file.'.php';
>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
    }
}

function Autoregister()
{
    spl_autoload_register('autoloader');
}

<<<<<<< HEAD
Autoregister();
=======
Autoregister();

>>>>>>> 85e0a6e9aed9d836f0a00a3d95c640baf8664a8d
