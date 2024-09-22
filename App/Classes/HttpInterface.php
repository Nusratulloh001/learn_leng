<?php

namespace App\Classes;

interface HttpInterface
{
    public function get ();
    public function post ();
    public function put ();
    public function delete ();
    public function head ();
}