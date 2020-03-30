<?php

namespace Model;

use Core\Entity;

class UserModel extends Entity{

    private $email;
    private $password;

    public function save($email, $password)
    {
        echo $email ."->>". $password;
    }
    public function checkMail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else
        {
            return false;
        }
    }
    


}