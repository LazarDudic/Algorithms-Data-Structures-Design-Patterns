<?php 

namespace App\Forum\Domain\Repositories;

use App\Forum\Domain\Models\Post;

class PostRepository 
{
    public function create($topicId, $data)
    {
        return Post::create(array_merge($data, ['topic_id' => $topicId]));
    }
}