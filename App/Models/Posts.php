<?php

namespace App\Models;

class Posts extends Model
{
    protected static array $collumns = ['user_id', 'title', 'content', 'created_at'];
    protected static string $table = 'posts';
}