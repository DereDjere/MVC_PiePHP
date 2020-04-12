<?php

namespace Model;

class ArticleModel extends \Core\Entity
{
    public $relation = [
        "has_many" => [array("table" => "tags", "key" => "id_tags")],
    ];
}
