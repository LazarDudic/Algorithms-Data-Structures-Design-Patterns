<?php

declare(strict_types=1);

interface IteratorInterface
{
    public function first(): void;
    public function next(): void;
    public function isValid(): bool;
    public function current();
}

class CountriesOrderIterator implements IteratorInterface
{
    public function __construct(
        private CountriesCollection $collection,
        private bool $reverse = false,
        private int $position = 0
    ) {}

    public function first(): void
    {
        $this->position = $this->reverse
            ? count($this->collection->getItems()) - 1
            : 0;
    }

    public function current(): string
    {
        return $this->collection->getItems()[$this->position];
    }

    public function next(): void
    {
        $this->reverse ? $this->position-- : $this->position++;
    }

    public function isValid(): bool
    {
        return isset($this->collection->getItems()[$this->position]);
    }
}

interface IteratorAggregateInterface
{
    public function getIterator(): IteratorInterface;
    public function getReverseIterator(): IteratorInterface;
}

class CountriesCollection implements IteratorAggregateInterface
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(string $item): void
    {
        $this->items[] = $item;
    }

    public function getIterator(): IteratorInterface
    {
        return new CountriesOrderIterator($this);
    }

    public function getReverseIterator(): IteratorInterface
    {
        return new CountriesOrderIterator($this, true);
    }
}

$collection = new CountriesCollection();

$collection->addItem('Serbia');
$collection->addItem('Argentina');
$collection->addItem('USA');

$iterator = $collection->getIterator();
$iterator->first();
while ($iterator->isValid()) {
    echo $iterator->current() . PHP_EOL;
    $iterator->next();
}

echo PHP_EOL;
echo "Reverse:" . PHP_EOL;
$reverseIterator = $collection->getReverseIterator();
$reverseIterator->first();
while ($reverseIterator->isValid()) {
    echo $reverseIterator->current() . PHP_EOL;
    $reverseIterator->next();
}
