<?php

namespace Core;

Class Request
{
    public static function Request()
    {
        if ($_POST) {
            $secupost = array('email' => htmlspecialchars(trim(stripslashes($_POST['email']))),'password' => $_POST['password']);
            return $secupost;
        } else if ($_GET) {
            $secuget = htmlspecialchars(trim(stripslashes($_POST)));
            return $secuget;
        }
    }
}