<?php

namespace App\Repositories\Eloquent;

use App\Models\Topic;
use App\Repositories\Contracts\TopicRepository;
use App\Repositories\RepositoryAbstract;

class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{
    public function model()
    {
        return Topic::class;
    }

    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}
