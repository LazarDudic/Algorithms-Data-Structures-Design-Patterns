<?php

abstract class Subscription
{
    abstract public function price();
}

class SubscriptionFactory
{
    protected array $availableSubsriptions = [
        'free' => FreeSubscription::class,
        'premium' => PremiumSubscription::class,
    ];

    public function create($subsription = 'free'): Subscription
    {
        if (!isset($this->availableSubsriptions[$subsription])) {
            throw new \Exception('A subscription ' . $subsription . ' could not be found');
        }

        return new $this->availableSubsriptions[$subsription];
    }
}

class FreeSubscription extends Subscription
{
    public function price()
    {
        return 0;
    }
}

class PremiumSubscription extends Subscription
{
    public function price()
    {
        return 150;
    }
}

$subsription = (new SubscriptionFactory())->create('premium');
echo 'Price for ' . get_class($subsription) . ' is $' . $subsription->price();
