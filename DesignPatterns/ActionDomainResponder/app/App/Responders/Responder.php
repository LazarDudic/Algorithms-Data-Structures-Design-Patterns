<?php
namespace App\App\Responders;

abstract class Responder 
{
    protected $response;

    abstract function respond();

    public function withResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}