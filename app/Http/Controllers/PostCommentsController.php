<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment; // Add this line to import the Comment model
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $user = request()->user();

        $comment = new Comment([
            'user_id' => $user->id,
            'body' => request('body'),
            'post_id' => $post->id, // Set the post_id explicitly
        ]);

        $comment->save(); // Save the comment

        return back();
    }
}
