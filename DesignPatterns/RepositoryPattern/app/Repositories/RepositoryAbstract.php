<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\CriteriaInterface;
use App\Repositories\Exceptions\NoModelDefined;
use Illuminate\Support\Arr;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    public function all()
    {
        return $this->model->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findWhere($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->model->where($column, $value)->firstOrFail();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->paginate($perPage);
    }

    public function create(array $properties)
    {
        return $this->model->create($properties);
    }

    public function update($id, array $properties)
    {
        return $this->find($id)->update($properties);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }

    public function withCriteria(... $criteria)
    {
        $criteria = Arr::flatten($criteria);

        foreach ($criteria as $criterion) {
            $this->model = $criterion->apply($this->model);
        }

        return $this;
    }

    protected function getModel()
    {
        if (! method_exists($this, 'model')) {
            throw new NoModelDefined();
        }

        return app()->make($this->model());
    }
}
