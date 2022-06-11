<?php
namespace App\App\Domain\Payloads;
 
class SuccessPayload extends Payload
{
    protected $status = 200;

    public function getData()
    {
        return $this->data;
    }
}