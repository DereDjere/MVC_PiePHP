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
        return $this->connect->lastInsertId();
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
    public function update($table, $fields)
    {
        $id = $fields['id'];
        unset($id);
        foreach($fields as $key => $value)
        {
            $request = $key . "= \"" . $value ."\",";
        }
        $sth = $this->connect->prepare("UPDATE $table SET $request WHERE id = $id");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        return true;
    }
    public function delete($table, $fields)
    {   
        $id = $fields['id'];
        unset($id);
        $sth = $this->connect->prepare("UPDATE $table SET disable = '1' WHERE id = $id");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        return true;
    }
    public function read_all($table)
    {
        $sth = $this->connect->prepare("SELECT * FROM $table");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    public function find($table, $parametre = array(
        'WHERE' => '',
        'ORDER BY' => '',
        'LIMIT' => ''
    ))
    {
        foreach($parametre as $key => $value)
        {
            if(!empty($value))
            {
                $params = "$key $value";
            }
        }
        echo "$table";
        $sth = $this->connect->prepare("SELECT * FROM $table $params");
        $sth->execute();
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
}
