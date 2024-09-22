<?php

namespace App\Controllers\Auth;

class Registration
{
    public function registration  ()
    {
        view('Auth/registration');
    }

    public function store ()
    {
        dd($_POST);
    }
}