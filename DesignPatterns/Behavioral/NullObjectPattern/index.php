<?php

interface User
{
    public function role(): string;
}

class Admin implements User
{
    public function role(): string
    {
        return "Admin";
    }
}

class Customer implements User
{
    public function role(): string
    {
        return "Customer";
    }
}

class NullUser implements User
{
    public function role(): string
    {
        return '';
    }
}

function getUser($userRole): User
{
    return match($userRole) {
        'admin' => new Admin(),
        'customer' => new Customer(),
        default => new NullUser(),
    };
}

function adminMiddleware(User $user)
{
    if ($user->role() !== 'Admin') {
        return 'denied'.PHP_EOL;
    } 
    return 'access'.PHP_EOL;
}

$users = ['admin', 'test', 'customer', 'admin', 'test'];

foreach ($users as $user) {
    $user = getUser($user);
    echo adminMiddleware($user);
}