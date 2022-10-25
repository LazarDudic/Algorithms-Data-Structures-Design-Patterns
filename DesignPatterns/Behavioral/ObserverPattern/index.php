<?php
declare(strict_types=1);

class UserRepository implements \SplSubject
{
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify($event = null): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function register(array $data)
    {
        // registration logic

        $this->notify();
    }
}

class WelcomeEmail implements \SplObserver
{
    public function update(\SplSubject $user): void
    {
        // mail($user->email, 'Welcome Subject', 'Welcome Message');
        echo 'Welcome Email sent to User';
    }
}

class NewUserRegisteredAdminNotification implements \SplObserver
{
    public function update(\SplSubject $user): void
    {
        // mail('admin@email.com', 'New User Registered Site Notification', $user->id . ' ' . $user->name);
        echo 'Email sent to Administrator';
    }
}

$user = new UserRepository();

$observer1 = new WelcomeEmail();
$user->attach($observer1);

$obserever2 = new NewUserRegisteredAdminNotification();
$user->attach($obserever2);

$user->register([]);

