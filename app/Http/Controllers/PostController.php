<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category'])
            )->paginate(6)
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        if (auth()->user()?->username != 'Gabriel') {
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }

        return view('posts.create');
    }
}
