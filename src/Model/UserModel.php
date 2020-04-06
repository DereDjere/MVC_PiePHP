<?php

namespace Model;

use Core\Core;
use Core\Entity;

/* use \Core\Entity; */

class UserModel extends \Core\Entity
{

    /* public function __construct($params)
    {
        var_dump($params);
    } */
    public function save()
    {
        /* echo $email ."->>". $password; */
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
        echo "test";
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
        foreach($sql as $key => $value)
        {
            /* var_dump($key); */
            /* var_dump($value); */
            foreach($value as $k => $val)
            {
                var_dump($k);
                var_dump($val);
            }
        }
    }
}
