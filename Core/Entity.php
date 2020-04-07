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
            foreach($result as $key => $value)
            {
                $this->$key = $value;
            }
        } else {
            foreach($params as $key => $value)
            {
                $this->$key = $value;
            }
        }
        


        /* $this->class = $class; */
        
    }
    public function HasMany()
    {
        // VOIR SI POSSIBILITE DE FUNCTION POUR HASMANY
        $orm = new ORM();

    }
    public function HasOne()
    {
        // VOIR SI POSSIBILITE DE FUNCTION POUR HasOne
    }
    public function ManyToMany()
    {
        // VOIR SI POSSIBILITE DE FUNCTION POUR ManyToMany
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
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->read(lcfirst(str_replace('Model', '', $class . 's')),get_object_vars($this));
        return $res;
    }
    public function update()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->update(lcfirst(str_replace('Model', '', $class . 's')),get_object_vars($this));
        return $res;
    }
    public function delete()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->delete(lcfirst(str_replace('Model', '', $class . 's')),get_object_vars($this));
        return $res;
    }
    public function read_all()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->read_all(lcfirst(str_replace('Model', '', $class . 's')));
        return $res;
    }
    public function find()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->find(lcfirst(str_replace('Model', '', $class . 's')));
        return $res;
    }
}
