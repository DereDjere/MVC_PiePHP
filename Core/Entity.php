<?php

namespace Core;

class Entity 
{
    public function __construct($params)
    {
        $class = get_class($this);
    }
    public function create()
    {
        // Determiner un class grace a getclass plus au dessus
        // Appel de L'ORM pour abstraire
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