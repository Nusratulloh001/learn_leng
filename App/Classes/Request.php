<?php

namespace App\Classes;


class Request {
    protected array $data = [];
    protected array $file = [];

    public function __construct()
    {
        $this -> data = $_REQUEST;
        $this -> file = $_FILES;
        $this -> properter();
    }

    public function input (string $key, $default = null) : ?string
    {
        return $this -> data[$key] ?? $default;
    }

    protected function combineData () : void
    {
        $this -> data += $this -> file;
    }

    public function all () : array
    {
        $this -> combineData();
        return $this -> data;
    }

    protected function properter ()
    {
        foreach ($this -> data as $key => $value){
            $this -> $key = $value;
        }
    }

    public function has (string $key) : bool
    {
        return (bool) isset($this -> data[$key]);
    }

    public function method () : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function path () : string
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}