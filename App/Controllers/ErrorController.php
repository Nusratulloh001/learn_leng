<?php

namespace App\Controllers;

class ErrorController
{
    public function notFound ()
    {
        http_response_code('404');
        return view('404');
    }
}