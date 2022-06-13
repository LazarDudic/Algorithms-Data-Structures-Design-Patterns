<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class ByUser implements CriterionInterface
{
    private $userId;

    public function __construct($id)
    {
        $this->userId = $id;
    }

    public function apply($model)
    {
        return $model->where('user_id', $this->userId);
    }
}
