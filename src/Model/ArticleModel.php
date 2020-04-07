<?php

namespace Model;

class ArticleModel extends \Core\Entity
{
    public $relation = [
        "has_many" => [array("table" => "tags", "key" => "id_tags")],
        /* "has_one" => [array("table" => "tags", "key" => "id_tags")],
        "many_to_many" => [array("table" => "article", "key" => "user_id")], */
    ];
}
