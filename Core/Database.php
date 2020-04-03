<?php

namespace Core;

use PDO;
use PDOException;

class Database
{

    private $bdd;

    function __construct()
    {

        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=MVC_PiePHP', "root", "root");
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } 
         catch (PDOException $error) { //
            echo "Error: " . $error->getMessage();
        }
    }

    public function ConnectBDD()
    {
        return $this->bdd;
    }
}
