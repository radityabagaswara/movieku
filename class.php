<?php

class Sql
{

    private $data;

    public function __construct()
    {
    }

    public static function getData()
    {
        self::$data;
    }
}


class database extends Sql
{

    public function __construct()
    {
        Sql::getData();
    }
}
