<?php
interface Shareable {
    public function share($url);
}

class ShareFacade implements Shareable {
  protected $twitter;    
  protected $google;   
  protected $facebook;    
    
  function __construct($twitter = null,$google = null, $facebook = null)
  {
    $this->twitter = $twitter ?: new Twitter();
    $this->google  = $google ?: new Google();
    $this->facebook  = $facebook ?: new Facebook();
  }  

  function share($url)
  {
    $this->twitter->share($url);
    $this->google->share($url);
    $this->facebook->share($url);
  }
}

class Twitter implements Shareable
{
    public function share($url){}
}

class Google implements Shareable
{
    public function share($url){}
}

class Facebook implements Shareable
{
    public function share($url){}
}


$share = new ShareFacade();

$share->share('https://example.com/post-about-facade');
