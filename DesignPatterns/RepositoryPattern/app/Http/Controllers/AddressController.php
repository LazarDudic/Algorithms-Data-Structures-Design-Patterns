<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AddressRepository;
use App\Repositories\Contracts\UserRepository;

class AddressController extends Controller
{
    private $users;
    private $addresses;

    public function __construct(UserRepository $users, AddressRepository $addresses)
    {
        $this->users = $users;
        $this->addresses = $addresses;
    }
    public function index()
    {
        $this->addresses->delete(3);
    }
}
