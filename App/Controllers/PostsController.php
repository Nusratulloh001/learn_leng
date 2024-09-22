<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Posts;
use App\Classes\Request;

class PostsController extends Controller
{
    public function index () : void
    {
        $this->view('posts', ['posts' => Posts::all()]);
    }

    public function show ($id)
    {
        $this -> view('show', ['post' => Posts::where($id)]);
    }

    public function create ()
    {
        $this -> view('create');
    }

    public function store ()
    {
        $request = new Request();
        $result = Posts::create(
            [
                'user_id' => 1,
                'title' => $request -> title,
                'content' => $request -> content,
                'created_at' => Posts::timestamp()
            ]
        );

        if ($request) {
            redirect('/posts', 200);
        }
    }

    public function edit ($id)
    {
        $this -> view('edit', ['post' => Posts::where($id)]);
    }

    public function update ($id)
    {
        $request = new Request();
        
        Posts::update(
            $id,
            [
                'user_id' => 5,
                'title' => $request-> title,
                'content' => $request -> content,
            ]
        );
        redirect('/posts', 200);
    }

    public function drop ($id)
    {
        Posts::delete($id);
        redirect('/posts');
    }
}