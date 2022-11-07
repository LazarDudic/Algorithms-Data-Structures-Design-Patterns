<?php

declare(strict_types=1);

interface CalculatorCommand
{
    public function execute($currentValue);
    public function undo($currentValue);
}

/**
 * The Invoker 
 */
class Calculator
{
    protected $value = 0;
    protected array $history = [];
    public function executeCommand(CalculatorCommand $command): void
    {
        $this->value = $command->execute($this->value);
        array_push($this->history, $command);
    }

    public function undo(): void
    {
        $command = array_pop($this->history);
        $this->value = $command->undo($this->value);
    }

    public function getValue()
    {
        return $this->value;
    }
}

class AddCommand implements CalculatorCommand
{
    public function __construct(protected $valueToAdd){}

    public function execute($currentValue)
    {
        return $currentValue + $this->valueToAdd;
    }

    public function undo($currentValue)
    {
        return $currentValue - $this->valueToAdd;
    }
}

class SubtractCommand implements CalculatorCommand
{
    public function __construct(protected $valueToAdd){}

    public function execute($currentValue)
    {
        return $currentValue - $this->valueToAdd;
    }

    public function undo($currentValue)
    {
        return $currentValue + $this->valueToAdd;
    }
}

class MultiplyCommand implements CalculatorCommand
{
    public function __construct(protected $valueToAdd){}

    public function execute($currentValue)
    {
        return $currentValue * $this->valueToAdd;
    }

    public function undo($currentValue)
    {
        return $currentValue / $this->valueToAdd;
    }
}

class DivideCommand implements CalculatorCommand
{
    public function __construct(protected $valueToAdd){}

    public function execute($currentValue)
    {
        return $currentValue / $this->valueToAdd;
    }

    public function undo($currentValue)
    {
        return $currentValue * $this->valueToAdd;
    }
}

$calculator = new Calculator();

$calculator->executeCommand(new AddCommand(10));
$calculator->executeCommand(new MultiplyCommand(22));
echo $calculator->getValue().PHP_EOL;
$calculator->undo();
echo $calculator->getValue().PHP_EOL;



