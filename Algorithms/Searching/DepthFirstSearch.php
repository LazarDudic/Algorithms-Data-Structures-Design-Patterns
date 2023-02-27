<?php declare(strict_types=1);


class Person
{
    protected array $friends = [];

    public function __construct(
        public readonly int $id,
        public readonly string $name
    ) {
    }

    public function addFriend(Person $friend) : void
    {
        $this->friends[] = $friend;
        $friend->friends[] = $this;
    }

    public function getFriends()
    {
        return $this->friends;
    }
}

class CoronaQuarantine
{
    public function __construct(
        protected array $visited = [],
        protected array $needsQuarantine = [],
        protected array $people = [],
    ) {
    }

    public function addPerson(Person $person): void
    {
        $this->visited[$person->id] = false;
        $this->people[] = $person;
    }

    public function traverse(Person $person) : void
    {
        $this->visited[$person->id] = true;
        $this->needsQuarantine[] = $person;

        foreach ($person->getFriends() as $friend) {
            if (!$this->visited[$friend->id]) {
                $this->traverse($friend);
            }
        }
    }

    public function getWhoNeedsToQuarantine() : array
    {
        return $this->needsQuarantine;
    }
}

// vertex 
$jovan = new Person(1, 'Jovan');
$marija = new Person(2, 'Marija');
$ivan = new Person(3, 'Ivan');
$sanja = new Person(4, 'Sanja');
$ana = new Person(5, 'Ana');

// add relationship
$jovan->addFriend($marija);
$marija->addFriend($ana);
$ana->addFriend($sanja);

// graph
$graph = new CoronaQuarantine();

// add vertex to graph
$graph->addPerson($jovan);
$graph->addPerson($marija);
$graph->addPerson($ivan);
$graph->addPerson($sanja);
$graph->addPerson($ana);

// DFS algorithm
$graph->traverse($jovan);

echo '<pre>';
// print_r($graph->getWhoNeedsToQuarantine());
foreach ($graph->getWhoNeedsToQuarantine() as $person) {
    echo $person->name . ',';
}
// Jovan, Marija, Ana, Sanja

// I don't like this example either :)