<?php
declare(strict_types=1);

class Superhero
{
    public function __construct(private WeaponStrategy $weapon) {}

    public function setWeaponStrategy(WeaponStrategy $weapon): void
    {
        $this->weapon = $weapon;
    }

    public function attack(): void
    {
        $this->weapon->doDammage();
    }
}

interface WeaponStrategy
{
    public function doDammage(): void;
}


class AxStrategy implements WeaponStrategy
{
    public function doDammage(): void
    {
        echo '30%' . "\n"; 
    }
}

class SwordStrategy implements WeaponStrategy
{
    public function doDammage(): void
    {
        echo '20%' . "\n";
    }
}

class KnifeStrategy implements WeaponStrategy
{
    public function doDammage(): void
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


