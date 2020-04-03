<?php

namespace Core;

use Core\Database;
use PDO;

class ORM
{
    public function __construct()
    {
        $this->db = new \Core\Database();
        $this->connect = $this->db->ConnectBDD();
    }
    public function create($table, $fields)
    {   
        var_dump($fields);
        $colonne = implode(',', array_keys($fields));
        $value = implode("','", $fields);
        $sth = $this->connect->prepare("INSERT INTO $table ($colonne) VALUES ('$value')");
        $sth->execute();
        /* $fetch = $sth->fetchAll(PDO::FETCH_ASSOC); */
        /* return $fetch; */
        return $sth->lastInsertId();
    }
    public function read($table, $id)
    {
        $sth = $this->connect->prepare("SELECT * FROM $table WHERE id = $id");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        /* $db = $this->DBase->connectBdd(); */
        /* $sth = $db->query('SELECT * FROM '.$table.' WHERE id='.$id.')');
        $fetch = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $fetch;  */
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function read_all()
    {
    }
}
