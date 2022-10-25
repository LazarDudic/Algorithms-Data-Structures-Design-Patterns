<?php
declare(strict_types=1);

interface BarInterface
{
    public function orderAlcohol() ;
}

class Bar implements BarInterface
{
    public function orderAlcohol()
    {
        return "Enjoy your drink! \n";
    }
}

class BarProxy implements BarInterface
{
    private Customer $customer;
    private BarInterface $bar;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->bar = new Bar();
    }

    public function orderAlcohol()
    {
        if ($this->customer->getAge() < 18) {
            return "Sorry, too young to order alcohol. \n";
        } 
           
        return $this->bar->orderAlcohol();
     }
}

class Customer
{
    public function __construct(protected int $age){}

    public function getAge(): int
    {
        return $this->age;
    }
}

function clientCode(Customer $customer)
{
    $bar = new BarProxy($customer);
    echo $bar->orderAlcohol();
}

clientCode(new Customer(14));
clientCode(new Customer(50));