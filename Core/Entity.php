<?php

namespace Core;

use Core\ORM;

class Entity 
{
    public function __construct($params)
    {   
        var_dump($params);
        echo 'test';
        /* $class = get_class($this); */
        /* ORM::read($params, $id); */
        
        /* $this->class = $class;
        var_dump($this->class); */

    }
    public function create()
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
        var_dump('createEntity');
        ORM::create(lcfirst(str_replace('Controller', '', $this->class)), $this);
    }
    public function read()
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
    public function read_all()
    {

    }
}