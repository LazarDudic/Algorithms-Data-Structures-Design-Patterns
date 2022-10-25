<?php
declare(strict_types=1);

interface Vehicle
{
    public function price();
}

class Audi implements Vehicle
{
    public function price() {
        return 20000;
    }
}

class VehicleFeature implements Vehicle
{
    public function __construct(protected Vehicle $vehicle){}

    public function price()
    {
        return $this->vehicle->price();
    }
}

class NavigationSystem extends VehicleFeature
{
    public function price()
    {
        return 300 + parent::price();
    }
}

class HeatedSeats extends VehicleFeature
{
    public function price()
    {
        return 150 + parent::price();
    }
}

function getTotal(Vehicle $vehicle)
{
    echo "Total: $" . $vehicle->price(). "\n";
}

$audi = new Audi();
$audi = new NavigationSystem($audi);
$audi = new HeatedSeats($audi);

getTotal($audi);


