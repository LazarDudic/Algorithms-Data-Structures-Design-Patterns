<?php
namespace App\App\Domain\Payloads;

abstract class Payload
{
    protected $data = null;
    protected $status = 200;

    public function __construct($data)
    {
        $this->data = $data;
    }

    abstract public function getData();

    public function getStatus()
    {
       return $this->status;
    }
}