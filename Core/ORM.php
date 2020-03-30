<?php

use bdd;

class ORM
{
    public function __construct()
    {
        $DBase = new bdd;
        
    }
    public function create($table, $fields)
    {   
        $db = $this->DBase->connectBdd();
        $sth = $db->query('INSERT INTO '. $table .' VALUES ('.$fields['email'].','.$fields['password'].')');
        $fetch = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $fetch; 
    }
    public function read()
    {
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
