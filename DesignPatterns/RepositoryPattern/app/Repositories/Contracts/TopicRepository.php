<?php

namespace App\Repositories\Contracts;

interface TopicRepository
{
    public function findBySlug($slug);
}
