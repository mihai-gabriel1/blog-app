<?php

namespace App\Http\Controllers;

use App\Models\Post; // Add this line to import the Post model
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body'),
            'post_id' => $post->id // Assign the post_id explicitly
        ]);

        return back();
    }




}
