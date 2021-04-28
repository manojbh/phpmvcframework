<?php

namespace Core\Database;

use PDO;
use App\Config;

class Database
{
    protected static $_instance = null;

    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            $host = Config::DB_HOST;
            $name = Config::DB_NAME;
            $user = Config::DB_USER;
            $pass = Config::DB_PASSWORD;


            self::$_instance = new PDO("mysql:host=$host;dbname=$name;charset=utf8", $user, $pass);
            self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$_instance->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
            self::$_instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            self::$_instance->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        }

        return self::$_instance;
    }
}