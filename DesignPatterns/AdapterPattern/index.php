<?php

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
    private BMW $adaptee;

    public function __construct(BMW $adaptee)
    {
        $this->adaptee = $adaptee;
    }

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