<?php

namespace App\Repositories\Eloquent;

use App\Models\Address;
use App\Repositories\RepositoryAbstract;
use App\Repositories\Contracts\AddressRepository;

class EloquentAddressRepository extends RepositoryAbstract implements AddressRepository
{
    public function model()
    {
        return Address::class;
    }

}
