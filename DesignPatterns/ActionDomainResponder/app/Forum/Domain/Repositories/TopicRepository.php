<?php 

namespace App\Forum\Domain\Repositories;

use App\Forum\Domain\Models\Topic;

class TopicRepository 
{
    public function create($data)
    {
        return Topic::create($data);
    }
}