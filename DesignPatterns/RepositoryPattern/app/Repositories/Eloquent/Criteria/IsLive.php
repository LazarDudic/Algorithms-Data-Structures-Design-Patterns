<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\Criteria\CriterionInterface;

class IsLive implements CriterionInterface
{
    public function apply($model)
    {
        return $model->live();
    }
}
