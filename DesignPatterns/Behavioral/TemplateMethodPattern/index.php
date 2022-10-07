<?php
abstract class SocialUser
{
    final public function register()
    {
        echo $apiData = $this->callApi() . "\n";
        echo 'Extract data from api: ' . $userData = $this->extractData($apiData) . "\n";
        echo $user = $this->store($userData) . "\n";
        echo $this->login($user);
    }

    abstract protected function extractData($userData);

    abstract protected function getUrl();

    protected function callApi()
    {
        return 'Register SocialUser using this url: ' . $this->getUrl();
    }

    protected function store($user)
    {
        return 'User Created from SocialUser';
    }

    final protected function login($user)
    {
        return 'User succesfully logged in';
    }
}

class FacebookUser extends SocialUser
{
    protected function getUrl()
    {
        return "https://www.facebook.com/api/";
    }

    protected function extractData($facebookData)
    {
        return '{id: 222, name: "Joe", email: "joe@example.com"}';
    }
}

class GoogleUser extends SocialUser
{
    protected function callApi()
    {
        return 'Register GoogleUser using this url: ' . $this->getUrl(); //Overide 
    }

    protected function getUrl()
    {
        return "https://www.google.com/api/";
    }

    protected function extractData($googleData)
    {
        return '{id: 444, name: "Mary", email: "mary@example.com"}';
    }
}

class TwitterUser extends SocialUser
{
    protected function getUrl()
    {
        return "https://www.twitter.com/api/";
    }

    protected function extractData($twitterData)
    {
        return '{id: 111, name: "Ben", email: "ben@example.com", some_key: 1321312}';
    }

    protected function store($userData)
    {
        return "User created from TwitterUser"; //Overide 
    }
}

function clientCode(SocialUser $class)
{
    echo "\n";
    $class->register();
    echo "\n";
}

clientCode(new FacebookUser());
clientCode(new TwitterUser());
clientCode(new GoogleUser());
