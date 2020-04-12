<?php

namespace Model;

use Core\Core;
use Core\Entity;

class UserModel extends \Core\Entity
{
    public $relation = [
        "has_many" => [array("table" => "article", "key" => "id_users")],
        "has_one" => [array("table" => "tags", "key" => "id_tags")],
        "many_to_many" => [array("table" => "article", "table2" => "tags")],
    ];
    

    public function save()
    {
        /* echo $email ."->>". $password; */
    }
    public function HasMany()
    {
        
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
            foreach($value as $k => $val)
            {
                $_SESSION[$k] = $val;
            }
        }
        return $_SESSION['id'];
    }
}
