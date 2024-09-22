<?php

namespace App\Controllers;

use App\Classes\Databases\Database;
use Exception;
use PDOException;

class Controller
{
    protected function view ($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../Views/' . $view . '.view.php';
    }

    public function test () 
    {
        try {
            throw new Exception('Test exception message!');
        } catch (Exception $e) {
            view('exception', ['error' => $e]);
        }
    }
}