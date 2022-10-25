<?php
declare(strict_types=1);
class User
{
    public function __construct(
        private int $age, 
        private $amountOwned, 
        private bool $verefied
    ){}
 
    public function getAge(): int
    {
        return $this->age;
    }
 
    public function getAmountOwned()
    {
        return $this->amountOwned;
    }

    public function isVerefied(): bool
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
    public function __construct(private $saleAmount){}
 
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

    public function __construct(private $price){}

    public function price()
    {
        return $this->price;
    }
 
    public function add(SpecificationInterface $specification): Car
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