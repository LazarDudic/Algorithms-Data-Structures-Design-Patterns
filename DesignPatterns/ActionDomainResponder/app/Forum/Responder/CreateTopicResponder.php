<?php

namespace App\Forum\Responder;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;

class CreateTopicResponder extends Responder
{
    public function respond()
    {
        return response()->json($this->response->getData(), $this->response->getStatus());
    }
}