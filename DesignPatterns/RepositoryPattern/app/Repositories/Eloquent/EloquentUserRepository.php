<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\RepositoryAbstract;

class EloquentUserRepository extends RepositoryAbstract implements UserRepository
{
    public function model()
    {
        return User::class;
    }

    public function createAddress($userId, array $properties)
    {
        $this->find($userId)->addresses()->create($properties);
    }

    public function deleteAddress($userId, $addressId)
    {
        $this->find($userId)->addresses()->findOrFail($addressId)->delete();

    }

}
