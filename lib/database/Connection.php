<?php

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        if (self::$conn === null) {
            self::$conn = new PDO('pgsql: host=localhost; dbname=desafio', 'midias', 'midias');
        }
        return self::$conn;
    }
}
