<?php

namespace Core;
use Core\bdd;

class ORM
{
    public function __construct()
    {
        $DBase = new bdd;
        
    }
    public function create($table, $fields)
    {   
        
        echo $table . "<br>";
        var_dump($fields);
        /* $db = $this->DBase->connectBdd();
        $sth = $db->query('INSERT INTO '. $table .' VALUES ('.$fields['email'].','.$fields['password'].')');
        $fetch = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $fetch;  */
    }
    public function read($table, $id)
    {

        $db = $this->DBase->connectBdd();
        $sth = $db->query('SELECT * FROM '.$table.' WHERE id='.$id.')');
        $fetch = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $fetch; 
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
