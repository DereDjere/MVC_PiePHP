<?php

namespace Core;
/* 
use Core\ORM; */

class Entity 
{
    public function __construct($params)
    {   
        /* echo 'test'; */
        $this->class = get_class($this);
        $this->params = $params;
        /* var_dump($this->class);
        var_dump($params); */
        if(array_key_exists('id', $params))
        {
            ORM::read($this->class,$this->params['id']);
        }
        else
        {
            Entity::create($this->class,$this->params);
        }
        
        
        /* $this->class = $class;
        var_dump($this->class); */

    }
    public static function create($class, $params)
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
        $class = str_replace('\\','',$class);
        ORM::create(lcfirst(str_replace('Model', '', $class)), $params);
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