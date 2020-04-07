<?php

namespace Model;

use Core\Core;
use Core\Entity;

/* use \Core\Entity; */

class UserModel extends \Core\Entity
{
    public $relation = [
        "has_many" => [array("table" => "article", "key" => "user_id")],
        "has_one" => [array("table" => "tags", "key" => "id_tags")],
        "has_many" => [array("table" => "article", "key" => "user_id")],
    ];
    
    /* public function __construct($params)
    {
        var_dump($params);
    } */
    public function save()
    {
        /* echo $email ."->>". $password; */
    }
    public function HasMany($relation)
    {
        foreach($relation as $key => $table)
        {
            foreach($table as $key => $value)
            {
                // Instancier mais pas dans cette class peut etre construct entity a voir
            }
        }
    }
    public function checkMail()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

            return true;
        } else {
            return false;
        }
    }
    public function Existmail()
    {
        $orm = new \Core\ORM();
        $class = str_replace('\\', '', get_class($this));
        $class = str_replace('Model', '', $class).'s';
        $info = $orm->find(lcfirst($class), $params = array('WHERE' => "email = '" . $this->email . "' AND password = '" . $this->password . "'"));
        if(!empty($info))
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function UserConnect()
    {
        $orm = new \Core\ORM();
        $class = str_replace('\\', '', get_class($this));
        $class = str_replace('Model', '', $class).'s';
        $sql = $orm->find(lcfirst($class), $params = array('WHERE' => "email = '" . $this->email . "'"));

        session_start();
        foreach($sql as $key => $value)
        {
            /* var_dump($key); */
            /* var_dump($value); */
            foreach($value as $k => $val)
            {
                $_SESSION[$k] = $val;
            }
        }
    }
}
