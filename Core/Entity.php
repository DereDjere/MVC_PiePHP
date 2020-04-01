<?php

namespace Core;
/* 
use Core\ORM; */

class Entity 
{
    public function __construct($params)
    {   
        var_dump("reussi");
        /* $this->class = get_class($this);
        $this->params = $params;
        if($params['id'])
        {
            ORM::read($this->class,$this->params['id']);
        }
        else
        {
            Entity::create($this->class,$this->params);
        } */
        
        
        /* $this->class = $class;
        var_dump($this->class); */

    }
    public static function create($class, $params)
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
        ORM::create(lcfirst(str_replace('Controller', '', $class)), $params);
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