<?php
namespace App\App\Domain\Payloads;

class ValidationPayload extends Payload
{
    protected $status = 422;
    
    public function getData()
    {
        return [
            'errors' => $this->data
        ];
    }
}