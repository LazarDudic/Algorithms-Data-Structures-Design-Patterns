<?php

class Superhero
{
    private $weapon;

    public function __construct(WeaponStrategy $weapon)
    {
        $this->weapon = $weapon;
    }

    public function setWeaponStrategy(WeaponStrategy $weapon)
    {
        $this->weapon = $weapon;
    }

    public function attack()
    {
        $this->weapon->doDammage();
    }
}

interface WeaponStrategy
{
    public function doDammage();
}


class AxStrategy implements WeaponStrategy
{
    public function doDammage()
    {
        echo '30%' . "\n"; 
    }
}

class SwordStrategy implements WeaponStrategy
{
    public function doDammage()
    {
        echo '20%' . "\n";
    }
}

class KnifeStrategy implements WeaponStrategy
{
    public function doDammage()
    {
        echo '10%' . "\n";
    }
}


$superhero = new Superhero(new AxStrategy());
$superhero->attack();

$superhero->setWeaponStrategy(new KnifeStrategy());
$superhero->attack();

$superhero->setWeaponStrategy(new SwordStrategy());
$superhero->attack();


