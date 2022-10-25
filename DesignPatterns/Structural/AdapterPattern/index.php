<?php
declare(strict_types=1);

interface Car
{
    public function startEngine();
}

class BMW
{
    public function engineStart()
    {
        echo "BMV engine started";
    }
}

class BMWAdapter implements Car
{
    public function __construct(private BMW $adaptee){}

    public function startEngine()
    {
        return $this->adaptee->engineStart();
    }
}

function client(Car $car) {
    $car->startEngine();
}

$adapter = new BMWAdapter(new BMW());

client($adapter);