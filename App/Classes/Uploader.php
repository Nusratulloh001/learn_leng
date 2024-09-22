<?php

namespace App\Classes;

class Uploader
{

    private string $targetDirectory;

    private array $allowedTypes = [
        'image/jpeg',
        'image/png',
        'image/jpg',
        'application/pdf',
        'video/mp4',
        'image/svg+xml',
        'application/x-msdownload'
    ];

    private int $maxFileSize = 20971520;
    private array $file;

    /**
     * @param array $file
     */
    public function __construct(array $file)
    {
        $this->file = $file;
    }

    public function fileName ()
    {
        return $this -> file['name'];
    }

    public function upload (array $file) : bool
    {
        if ($this -> validateFile($file)) {
            return $this -> save($file);
        }
        return false;
    }

    public function setUploadPath (string $path) : void
    {
        $this -> targetDirectory = "{$path}";
    }

    public function saveTo (string $path = null) : object
    {
        $this -> setUploadPath($path);
        return $this;
    }

    public function getUploadPath () : string
    {
        return $this -> targetDirectory;
    }

    public function uniqName () : string
    {
        return basename(rand(0, 100000) . uniqid() . '.' . $this -> getImageType($this -> file));
    }

    private function targetDirectoryFile () : string
    {
        return $this -> targetDirectory . '/' . $this -> uniqName();
    }

    private function save (array $file) : bool
    {
        return move_uploaded_file(
            $file['tmp_name'],
            $this -> targetDirectoryFile($this -> uniqName(), $this -> getImageType($file))
        );
    }

    public function getImageType ($file) : string
    {
        return pathinfo($file['name'], PATHINFO_EXTENSION);
    }

    private function validateFile(array $file) : bool
    {
        if ($file['size'] > $this -> maxFileSize){
            return false;
        }
        if (!in_array($file['type'], $this -> allowedTypes)){
            return false;
        }
        return true;
    }
}