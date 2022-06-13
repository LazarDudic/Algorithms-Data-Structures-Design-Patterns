<?php

class User
{
    private $age;
    private $amountOwned;
    private $verefied;
 
    public function __construct($age, $amountOwned, $verefied)
    {
        $this->age = $age;
        $this->amountOwned = $amountOwned;
        $this->verefied = $verefied;
    }
 
    public function getAge()
    {
        return $this->age;
    }
 
    public function getAmountOwned()
    {
        return $this->amountOwned;
    }

    public function isVerefied()
    {
        return $this->verefied;
    }
}

interface SpecificationInterface
{
    public function isSatisfiedBy(User $user) : bool;
}

class UserIsAdultSpecification implements SpecificationInterface
{
    private const MINIMUM_LEGAL_AGE_LIMIT = 18;
 
    public function isSatisfiedBy(User $user) : bool
    {
        return $user->getAge() >= self::MINIMUM_LEGAL_AGE_LIMIT;
    }
}

class UserHasEnoughMoneySpecification implements SpecificationInterface
{
    private $saleAmount;
 
    public function __construct(float $saleAmount)
    {
        $this->saleAmount = $saleAmount;
    }
 
    public function isSatisfiedBy(User $user): bool
    {
        return $user->getAmountOwned() >= $this->saleAmount;
    }
}

class UserIsVerifiedSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(User $user): bool
    {
        return $user->isVerefied();
    }
}

class Car
{
    private $specifications;
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function price()
    {
        return $this->price;
    }
 
    public function add(SpecificationInterface $specification)
    {
        $this->specifications[] = $specification;
 
        return $this;
    }
 
    public function canBeSold(User $user): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($user)) {
                return false;
            }
        }
 
        return true;
    }
}

$user = new User(29, 700000, false);
 
$car = new Car(60000);
$car->add(new UserIsVerifiedSpecification())
    ->add(new UserIsAdultSpecification())
    ->add(new UserHasEnoughMoneySpecification($car->price()));
 
$res = $car->canBeSold($user);
 
echo $res ? 'Can Buy' : 'Cannot buy';