<?php

namespace App\Controllers;

use App\Classes\Databases\Connection;
use App\Classes\Uploader;

class FileController extends Controller
{
    public function index ()
    {
        $this -> view('file');
    }

    public function addFile ()
    {
        $uploader = new Uploader($_FILES['file']);
        $uploader -> saveTo('./images');

        if ($uploader -> upload($_FILES['file'])) {
            $connect = new Connection();
            $connect -> query("INSERT INTO images (image) VALUES (:image)", [":image" => $uploader -> uniqName()]);
            redirect('/', 200);
        }
    }
}