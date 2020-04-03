<?php

namespace Core;
/* 
use Core\ORM; */

class Entity
{
    public function __construct($params)
    {
        /* echo 'test'; */
        
        /* var_dump($this->class); */
        /* var_dump($params); */
        if (array_key_exists('id', $params)) {
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $this->orm->read(lcfirst(str_replace('Model', '', $class . 's')), $this->params['id']);
        } else {
            foreach($params as $key => $value)
            {
                $this->$key = $value;
            }
        }


        /* $this->class = $class; */
        
    }
    public function create()
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->create(lcfirst(str_replace('Model', '', $class . 's')),get_object_vars($this));
        return $res;
    }
    public function read()
    {
        
    }
    public function update()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->update(lcfirst(str_replace('Model', '', $class . 's')),get_object_vars($this));
        return true;
    }
    public function delete()
    {
    }
    public function read_all()
    {
    }
}
