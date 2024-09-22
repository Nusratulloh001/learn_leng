<?php

namespace App\Classes\Databases;

use PDO;
use Exception;
use PDOException;

class Connection {
    private PDO $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO('mysql:dbname=learn_leng;host=127.0.0.1', 'root');
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception('Connection ERROR: ' . $e->getMessage());
        }
    }

    public static function instance(): self
    {
        return new self();
    }

    public function getConnection(): PDO
    {
        return $this->connect;
    }
}
