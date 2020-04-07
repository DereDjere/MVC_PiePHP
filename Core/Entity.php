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
        /* var_dump($params); */
        if (array_key_exists('id', $params)) {
            /* echo "id"; 
            var_dump($params);  */
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->read(lcfirst(str_replace('Model', '', $class . 's')), $params['id']);
            /* var_dump($result); */
            foreach ($result as $key => $value) {
                foreach ($value as $key => $val) {
                    $this->$key = $val;
                    /* var_dump($this->$key); */
                    /* var_dump($key);
                    var_dump($val); */
                }
            }
        } else {
            foreach ($params as $key => $value) {
                $this->$key = $value;
                /* var_dump($this->$key); */
            }
        }
        /* var_dump($this->relation); */
        if (array_key_exists('has_many', $this->relation) && isset($this->id)) {
            /* foreach ($this->relation['has_many'] as $key => $val) {
                foreach ($val as $key => $value) {
                    
                    var_dump($key);
                    var_dump($value);
                    
                }
            } */
            $this->has_many_table = $this->relation['has_many'][0]['table'];
            $this->many_key = $this->relation['has_many'][0]['key'];
            /* var_dump($has_many); */
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->find($this->has_many_table . 's', array("WHERE " => "$this->has_many_key = $this->id"));
            var_dump($result);
            foreach($result as $key => $value)
            {
                foreach ($value as $key => $val) {
                    $this->has_many_table->$key = $val;
                }
            }
        }


        /* $this->class = $class; */
    }
    public function HasMany()
    {
        // VOIR SI POSSIBILITE DE FUNCTION POUR HASMANY
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $class = lcfirst(str_replace('Model', '', $class . 's'));
        $result = $orm->find($class, array("INNER JOIN $this->has_many_table ON $this->has_many_key = id"));
    }
    public function HasOne()
    {
    }
    public function ManyToMany()
    {
        // VOIR SI POSSIBILITE DE FUNCTION POUR ManyToMany
    }
    function relationid()
    {
    }
    public function create()
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->create(lcfirst(str_replace('Model', '', $class . 's')), get_object_vars($this));
        return $res;
    }
    public function read()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->read(lcfirst(str_replace('Model', '', $class . 's')), get_object_vars($this));
        return $res;
    }
    public function update()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->update(lcfirst(str_replace('Model', '', $class . 's')), get_object_vars($this));
        return $res;
    }
    public function delete()
    {
        $orm = new ORM();
        $class = str_replace('\\', '', get_class($this));
        $res = $orm->delete(lcfirst(str_replace('Model', '', $class . 's')), get_object_vars($this));
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
