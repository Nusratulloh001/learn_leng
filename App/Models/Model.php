<?php

namespace App\Models;

use App\Classes\Databases\Database;

class Model
{
    private $database;

    protected static array $columns = [];

    public function __construct()
    {
        $this -> database = Database::instance();
        $this -> listCollumns();
        return new self();
    }

    public static function all () : array
    {
        return Database::instance() -> select(static::$table);
    }

    public static function where ($id)
    {
        return Database::instance() -> where(static::$table, $id);
    }

    public static function create (array $data) : bool
    {
        return (bool) Database::instance()->insert(static::$table, $data);
    }

    public static function update (int $id, array $data)
    {
        return Database::instance()->update(static::$table, $id, $data);
    }

    public static function delete ($id)
    {
        Database::instance()->delete(static::$table, $id);
    }

    public static function timestamp () : string
    {
        return date('Y-m-d' . ' ' . 'H:i:s');
    }

    public function listColumns() : void
    {
        foreach (static::$columns as $column){
            $this -> $column;
        }
    }
}