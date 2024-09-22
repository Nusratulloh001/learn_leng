<?php

namespace App\Ocean;

class UserModel
{
    private static string $name;
    private static string $email;
    private static string $password;

    public function __construct ($username, $email, $password)
    {
        static::$name = $username;
        static::$email = $email;
        static::$password = password_hash($password, PASSWORD_DEFAULT);
    }

    public static function getName() : string
    {
        return static::$name;
    }

    public static function getEmail () : string
    {
        return static::$email;
    }

    public static function getPassword () : string
    {
        return static::$password;
    }

    public static function verifyPassword ($password) : bool
    {
        return password_verify($password, static::$password);
    }
}