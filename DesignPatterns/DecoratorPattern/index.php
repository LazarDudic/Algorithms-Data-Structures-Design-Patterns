<?php

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
    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    public function price()
    {
        return $this->vehicle->price();
    }
}

class NavigationSystem extends VehicleFeature
{
    public function price(): string
    {
        return 300 + parent::price();
    }
}

class HeatedSeats extends VehicleFeature
{
    public function price(): string
    {
        return 150 + parent::price();
    }
}

function getTotal(Vehicle $vehicle)
{
    echo "Total: $" . $vehicle->price();
}

$audi = new Audi();
$audi = new NavigationSystem($audi);
$audi = new HeatedSeats($audi);

getTotal($audi);


