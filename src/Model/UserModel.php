<?php

namespace UserModel;

class UserModel{

    private $email;
    private $password;

    function save($email, $password)
    {
        echo $email ."->>". $password;
    }


}