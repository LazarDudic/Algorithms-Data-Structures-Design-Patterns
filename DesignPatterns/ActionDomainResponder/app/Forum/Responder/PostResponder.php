<?php

namespace App\Forum\Responder;

use App\Forum\Domain\Models\Post;

class PostResponder 
{
    public function respond(Post $post)
    {
        return response()->json($post, 200);
    }
}