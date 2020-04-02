<?php

namespace Core;
use \Core\bdd;

class ORM
{
    private $db;

    public function create($table, $fields)
    {   
        /* $table = str_replace('',,$tableclass)
        
        echo $table . "<br>";
        var_dump($fields); */
        echo $table . "<br>";
        $DBase = new bdd;
        $db = $DBase->ConnectBDD();
        $colonne = implode(',',array_keys($fields));
        $value = implode(',',$fields);     
        $sth = $db->query('INSERT INTO '. $table .'('.$colonne.') VALUES ('.$fields['email'].','.$fields['pwd'].')');
        $fetch = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return "<h1>Compte cree</h1>";
    }
    public function read($table, $id)
    {

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
