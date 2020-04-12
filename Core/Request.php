<?php

namespace Core;

Class Request
{
    public static function Request()
    {
        if ($_POST) {
            $secupost = array('email' => htmlspecialchars(trim(stripslashes($_POST['email']))),'password' => $_POST['password']);
            return $secupost;
        } 
        if ($_GET) {
            $secuget = array(htmlspecialchars(trim(stripslashes($_GET))));
            return $secuget;
        }

    }
}