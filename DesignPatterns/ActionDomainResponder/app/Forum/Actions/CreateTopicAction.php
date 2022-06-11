<?php

namespace App\Forum\Actions;

use App\Forum\Domain\Services\CreateTopicService;
use App\Forum\Responder\CreateTopicResponder;
use Illuminate\Http\Request;

class CreateTopicAction 
{
    protected $service;
    protected $responder;

    public function __construct(CreateTopicService $service, CreateTopicResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

    public function __invoke(Request $request)
    {
        $topic = $this->service->handle($request->only('title', 'body'));

        return $this->responder->withResponse($topic)->respond();
    }
}