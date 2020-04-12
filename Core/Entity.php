<?php

namespace Core;

class Entity
{
    public function __construct($params)
    {

        if (array_key_exists('id', $params)) {
 
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->read(lcfirst(str_replace('Model', '', $class . 's')), $params['id']);
            foreach ($result as $key => $value) {
                foreach ($value as $key => $val) {
                    $this->$key = $val;
  
                }
            }
        } else {
            foreach ($params as $key => $value) {
                $this->$key = $value;
            }
        }
        // RELATION NON FONCTIONNEL

        /* if (array_key_exists('has_many', $this->relation) && isset($this->id)) {
   
            $this->has_many_table = $this->relation['has_many'][0]['table'];
            $this->has_many_key = $this->relation['has_many'][0]['key'];
            $has_many_table = $this->relation['has_many'][0]['table'];
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->find($this->has_many_table . 's', array("WHERE " => "$this->has_many_key = $this->id"));
            foreach($result as $key => $value)
            {
                foreach ($value as $key => $val) {
                    $this->$has_many_table[$key] = $val;
                }
            }
        }
       if (array_key_exists('has_one', $this->relation) && isset($this->id)) {
             
            $this->has_one_table = $this->relation['has_one'][0]['table'];
            $this->has_one_key = $this->relation['has_one'][0]['key'];
            $has_one_table = $this->relation['has_one'][0]['table'];

            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->find($this->has_one_table, array("WHERE " => "$this->has_one_key = $this->id"));
 
            foreach($result as $key => $value)
            {
                foreach ($value as $key => $val) {
                    $this->$has_one_table[$key] = $val;
                }
            }
        }
        if (array_key_exists('many_to_many', $this->relation) && isset($this->id)) {
            $this->has_one_table = $this->relation['many_to_many'][0]['table'];
            $this->has_one_table2 = $this->relation['many_to_many'][0]['table2'];
            $this->many_to_many_key = $this->relation['many_to_many'][0]['key'];
            $many_to_many_table = $this->relation['many_to_many'][0]['table'];
            $orm = new ORM();
            $class = str_replace('\\', '', get_class($this));
            $result = $orm->read_all($this->many_to_many_table."_".$this->has_one_table2);
            foreach($result as $key => $value)
            {
                foreach ($value as $key => $val) {
                    $this->$has_one_table[$key] = $val;
                }
            }
        } */
    }
    public function create()
    {
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
